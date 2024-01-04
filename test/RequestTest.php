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

    public function testCanDeserializeWithExpand()
    {
        $json = <<<JSON
{
    "path": "\/ping-me",
    "expand": {
        "acting_user": "id",
        "channel": "id",
        "user": "id"
    },
    "context": {
        "app_id": "",
        "mattermost_site_url": "https:\/\/mattermost.com",
        "developer_mode": true,
        "app_path": "\/plugins\/com.mattermost.apps\/apps\/com.cedricziel.mm-bot-dev",
        "bot_user_id": "nzq9s8oasidzismitnygwrobu1r",
        "bot_access_token": "spyg3c8ycpyiims88papqsqpkhh",
        "acting_user": {
            "id": "c7h6k9rhn3dmfm9pkq56noxp6c",
            "delete_at": 0,
            "username": "",
            "auth_service": "",
            "email": "",
            "nickname": "",
            "first_name": "",
            "last_name": "",
            "position": "",
            "roles": "",
            "locale": "",
            "timezone": null,
            "disable_welcome_email": false
        },
        "channel": {
            "id": "nuwj8tuj1j8m9m1meetx4r779r",
            "create_at": 0,
            "update_at": 0,
            "delete_at": 0,
            "team_id": "knpx5yezhby8xd6qbnnm9t5sye",
            "type": "",
            "display_name": "",
            "name": "",
            "header": "",
            "purpose": "",
            "last_post_at": 0,
            "total_msg_count": 0,
            "extra_update_at": 0,
            "creator_id": "",
            "scheme_id": null,
            "props": null,
            "group_constrained": null,
            "shared": null,
            "total_msg_count_root": 0,
            "policy_id": null,
            "last_root_post_at": 0
        },
        "oauth2": {}
    },
    "raw_command": "\/ping "
}
JSON;
        $request = $this->serializer->deserialize($json, Request::class, 'json');
        self::assertEquals('/ping-me', $request->getPath());
        self::assertNotNull($request->getExpand());
        self::assertNotNull($request->getContext()->getChannel());
        self::assertNotEmpty($request->getContext()->getChannel()->getId());
        self::assertNotNull($request->getContext()->getActingUser());
        self::assertNotEmpty($request->getContext()->getActingUser()->getId());
    }
}
