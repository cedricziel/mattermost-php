<?php

namespace CedricZiel\MattermostPhp\Test;

use CedricZiel\MattermostPhp\Manifest;
use CedricZiel\MattermostPhp\Request;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Manifest::class)]
#[CoversClass(Request::class)]
class Test extends AbstractTest
{

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
