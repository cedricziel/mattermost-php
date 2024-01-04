<?php

namespace CedricZiel\MattermostPhp\Test;

use CedricZiel\MattermostPhp\Request;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Request::class)]
class RequestTest extends MattermostTestCase
{
    public function testCanDeserializeCommandRequest()
    {
        $json = <<<JSON
{
    "path": "\/ping-me",
    "expand": {},
    "context": {
        "app_id": "",
        "mattermost_site_url": "https:\/\/mattermost.com",
        "developer_mode": true,
        "app_path": "\/plugins\/com.mattermost.apps\/apps\/com.cedricziel.mm-bot-dev",
        "bot_user_id": "nzq9s8oasidzimitnygwsrobu1r",
        "bot_access_token": "jdr84j3wbfbjijzjsz7c4hbbgay",
        "oauth2": {}
    },
    "raw_command": "\/ping "
}
JSON;
        $request = $this->serializer->deserialize($json, Request::class, 'json');

        self::assertEquals('/ping-me', $request->getPath());
        self::assertNotNull($request->getExpand());
        self::assertNotNull($request->getContext()->getOauth2());
        self::assertEquals('jdr84j3wbfbjijzjsz7c4hbbgay', $request->getContext()->getBotAccessToken());
    }
}
