<?php

namespace CedricZiel\MattermostPhp\Test;

use CedricZiel\MattermostPhp\AppClient;
use CedricZiel\MattermostPhp\Apps\Call;
use CedricZiel\MattermostPhp\Context;
use CedricZiel\MattermostPhp\Post;
use CedricZiel\MattermostPhp\Timer;
use CedricZiel\MattermostPhp\User;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\HttpClient\Psr18Client;
use Symfony\Component\HttpClient\Response\JsonMockResponse;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

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
        $client = AppClient::asBot($this->createBotContext(), $this->serializer);

        $this->assertInstanceOf(AppClient::class, $client);
        self::assertEquals('bot_access_token', $client->getToken());
        self::assertEquals('https://example.com', $client->getMattermostSiteUrl());
    }

    public function testAppClientAsActingUserCanBeCreated()
    {
        $client = AppClient::asActingUser($this->createUserContext(), $this->serializer);

        $this->assertInstanceOf(AppClient::class, $client);
        self::assertEquals('acting_user_access_token', $client->getToken());
        self::assertEquals('https://example.com', $client->getMattermostSiteUrl());
        self::assertEquals('acting_user_id', $client->getUserId());
    }

    public function testCanCreateTimer()
    {
        $timer = Timer::create(new \DateTime(), new Call('/foo'));

        $appClient = AppClient::asBot($this->createBotContext(), $this->serializer);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Not implemented');
        $appClient->createTimer($timer);
    }

    public function testCanCreatePost()
    {
        $httpClient = $this->createMock(HttpClientInterface::class);

        $httpClient->expects(self::once())
            ->method('request')->with('POST', 'https://example.com/api/v4/posts')
            ->willReturn(
                MockResponse::fromRequest(
                    'POST',
                    'https://example.com/api/v4/posts',
                    [],
                    new JsonMockResponse(<<<JSON
{
  "message": "foo"
}
JSON),
                )
            )
        ;

        $psr18Client = new Psr18Client($httpClient);

        $appClient = AppClient::asBot(
            $this->createBotContext(),
            $this->serializer,
            $psr18Client,
            $psr18Client,
            $psr18Client,
        );

        $post = (new Post())->setMessage('foo');
        $appClient->createPost($post);

        self::assertEquals('foo', $post->getMessage());
    }
}
