<?php

namespace CedricZiel\MattermostPhp\Test;

use CedricZiel\MattermostPhp\AppClient;
use CedricZiel\MattermostPhp\Context;
use CedricZiel\MattermostPhp\User;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(AppClient::class)]
class AppClientTest extends MattermostTestCase
{
    public function testAppClientAsBotCanBeCreated()
    {
        $context = new Context(
            mattermost_site_url: 'https://example.com',
            bot_user_id: 'bot_user_id',
            bot_access_token: 'bot_access_token',
        );

        $client = AppClient::asBot($context);

        $this->assertInstanceOf(AppClient::class, $client);
        self::assertEquals('bot_access_token', $client->getToken());
        self::assertEquals('https://example.com', $client->getMattermostSiteUrl());
    }

    public function testAppClientAsActingUserCanBeCreated()
    {
        $context = new Context(
            mattermost_site_url: 'https://example.com',
            bot_user_id: 'bot_user_id',
            bot_access_token: 'bot_access_token',
            acting_user: new User(
                id: 'acting_user_id',
            ),
            acting_user_access_token: 'acting_user_access_token',
        );

        $client = AppClient::asActingUser($context);

        $this->assertInstanceOf(AppClient::class, $client);
        self::assertEquals('acting_user_access_token', $client->getToken());
        self::assertEquals('https://example.com', $client->getMattermostSiteUrl());
        self::assertEquals('acting_user_id', $client->getUserId());
    }
}
