<?php

namespace CedricZiel\MattermostPhp\Test;

use CedricZiel\MattermostPhp\AppClient;
use CedricZiel\MattermostPhp\Call;
use CedricZiel\MattermostPhp\Context;
use CedricZiel\MattermostPhp\Timer;
use CedricZiel\MattermostPhp\User;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(AppClient::class)]
class AppClientTest extends MattermostTestCase
{
    protected function createUserContext(): Context
    {
        return new Context(
            mattermost_site_url: 'https://example.com',
            bot_user_id: 'bot_user_id',
            bot_access_token: 'bot_access_token',
            acting_user: new User(
                id: 'acting_user_id',
            ),
            acting_user_access_token: 'acting_user_access_token',
        );
    }

    protected function createBotContext(): Context
    {
        return new Context(
            mattermost_site_url: 'https://example.com',
            bot_user_id: 'bot_user_id',
            bot_access_token: 'bot_access_token',
        );
    }

    public function testAppClientAsBotCanBeCreated()
    {
        $client = AppClient::asBot($this->createBotContext());

        $this->assertInstanceOf(AppClient::class, $client);
        self::assertEquals('bot_access_token', $client->getToken());
        self::assertEquals('https://example.com', $client->getMattermostSiteUrl());
    }

    public function testAppClientAsActingUserCanBeCreated()
    {
        $client = AppClient::asActingUser($this->createUserContext());

        $this->assertInstanceOf(AppClient::class, $client);
        self::assertEquals('acting_user_access_token', $client->getToken());
        self::assertEquals('https://example.com', $client->getMattermostSiteUrl());
        self::assertEquals('acting_user_id', $client->getUserId());
    }

    public function testCanCreateTimer()
    {
        $timer = Timer::create(new \DateTime(), new Call('/foo'));

        $appClient = AppClient::asBot($this->createBotContext());

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Not implemented');
        $appClient->createTimer($timer);
    }
}
