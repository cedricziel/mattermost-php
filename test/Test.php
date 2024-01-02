<?php

namespace CedricZiel\MattermostPhp\Test;

use CedricZiel\MattermostPhp\Manifest;
use CedricZiel\MattermostPhp\Request;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Test extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $this->serializer = new Serializer(
            [
                new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter),
            ],
            [
                new JsonEncoder(),
            ],
        );
    }

    public function testCanDeserializeManiest()
    {
        $json = <<<EOF
{
    "app_id": "hello-world",
    "version":"v0.8.0",
    "display_name": "Hello, world!",
    "icon": "icon.png",
    "homepage_url": "https://github.com/mattermost/mattermost-plugin-apps",
    "requested_permissions": [
        "act_as_bot"
    ],
    "requested_locations": [
        "/channel_header",
        "/command"
    ],
    "on_install": {
        "path": "/install"
    },
    "http": {
        "root_url": "http://localhost:4000"
    }
}
EOF;

        /** @var Manifest $manifest */
        $manifest = $this->serializer->deserialize($json, Manifest::class, 'json');

        $this->assertEquals('hello-world', $manifest->getId());
        $this->assertEquals('v0.8.0', $manifest->getVersion());
        $this->assertEquals('Hello, world!', $manifest->getDisplayName());
    }

    public function testPost()
    {
        $json = <<<EOF
{
    "path":"/on-install",
    "state":[],
    "context":{
        "app_id":"",
        "mattermost_site_url":"https://mattermost.com",
        "developer_mode":true,
        "app_path":"/plugins/com.mattermost.apps/apps/com.example.mattermost-bot",
        "bot_user_id":"fzn1ywdqnfn7x8n4bpa1qr8nty",
        "bot_access_token":"jbdsyk7g8j8gdytpiesp9f3qfa",
        "oauth2":{}
    }
}
EOF;

        $request = $this->serializer->deserialize($json, Request::class, 'json');

        $this->assertEquals('/on-install', $request->getPath());
    }

    public function testCanDeserializePingRequest()
    {
        $pingRequest = <<<EOF
{
    "path":"/ping",
    "context":{
        "app_id":"",
        "mattermost_site_url":"",
        "app_path":"",
        "bot_user_id":"",
        "oauth2":{}
    }
}
EOF;

        $request = $this->serializer->deserialize($pingRequest, Request::class, 'json');

        $this->assertEquals('/ping', $request->getPath());
    }
}
