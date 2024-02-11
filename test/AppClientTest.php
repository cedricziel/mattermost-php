<?php

namespace CedricZiel\MattermostPhp\Test;

use CedricZiel\MattermostPhp\AppClient;
use CedricZiel\MattermostPhp\Apps\Call;
use CedricZiel\MattermostPhp\Client\Model\Post;
use CedricZiel\MattermostPhp\Context;
use CedricZiel\MattermostPhp\Timer;
use CedricZiel\MattermostPhp\User;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Stream;
use PHPUnit\Framework\Attributes\CoversClass;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\HttpClient\Psr18Client;
use Http\Mock\Client as MockClient;
use function PHPUnit\Framework\assertInstanceOf;

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
        $httpFactory = new HttpFactory();

        $c = new MockClient();
        $channelResponse = $this->createMock('Psr\Http\Message\ResponseInterface');
        $channelResponse->expects(self::atLeast(1))->method('getStatusCode')->willReturn(201);
        $channelResponse->expects(self::atLeast(1))->method('getBody')->willReturn($httpFactory->createStream('{"id": "foo"}'));
        $c->addResponse($channelResponse);

        $psr18Client = new Psr18Client();

        $appClient = AppClient::asBot(
            $this->createBotContext(),
            $this->serializer,
            $c,
        );

        $post = new Post(channel_id: '123', message: 'foo');
        $appClient->createPost($post);

        self::assertEquals('foo', $post->message);
    }

    public function testCanCreateDM()
    {
        $httpFactory = new HttpFactory();

        $c = new MockClient();
        $channelResponse = $this->createMock('Psr\Http\Message\ResponseInterface');
        $channelResponse->expects(self::atLeast(1))->method('getStatusCode')->willReturn(201);
        $channelResponse->expects(self::atLeast(1))->method('getBody')->willReturn($httpFactory->createStream('{"id": "foo"}'));
        $c->addResponse($channelResponse);

        $postResponse = $this->createMock('Psr\Http\Message\ResponseInterface');
        $postResponse->expects(self::atLeast(1))->method('getStatusCode')->willReturn(201);
        $postResponse->expects(self::atLeast(1))->method('getBody')->willReturn($httpFactory->createStream('{"id": "foo"}'));
        $c->addResponse($postResponse);

        $client = AppClient::asBot(
            $this->createBotContext(),
            $this->serializer,
            $c,
        );

        $this->assertInstanceOf(AppClient::class, $client);
        self::assertEquals('bot_access_token', $client->getToken());
        self::assertEquals('https://example.com', $client->getMattermostSiteUrl());

        $post = $client->DM('user_id', 'message');
        assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $post);
    }
}
