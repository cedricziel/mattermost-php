<?php

namespace CedricZiel\MattermostPhp;

use CedricZiel\MattermostPhp\Client\Endpoint\ChannelsEndpoint;
use CedricZiel\MattermostPhp\Client\Endpoint\PostsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreateDirectChannelRequest;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18Client;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\Serializer\SerializerInterface;

class AppClient
{
    protected Context $context;
    protected ?string $userId;

    public function __construct(
        protected string $token,
        protected string $mattermostSiteUrl,
        protected SerializerInterface $serializer,
        protected ?ClientInterface $client = null,
        protected ?RequestFactoryInterface $requestFactory = null,
        protected ?StreamFactoryInterface $streamFactory = null,
    ) {
    }

    public static function asBot(
        Context          $context,
        SerializerInterface $serializer,
        ?ClientInterface $client = null,
        ?RequestFactoryInterface $requestFactory = null,
        ?StreamFactoryInterface $streamFactory = null,
    ): AppClient {

        $client = new AppClient(
            $context->getBotAccessToken(),
            $context->getMattermostSiteUrl(),
            $serializer,
            $client ?? new Psr18Client(),
            $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory(),
            $streamFactory ?? Psr17FactoryDiscovery::findStreamFactory(),
        );

        $client->setUserId($context->getBotUserId());

        return $client;
    }

    public static function asActingUser(
        Context          $context,
        SerializerInterface $serializer,
        ?ClientInterface $client = null,
        ?RequestFactoryInterface $requestFactory = null,
        ?StreamFactoryInterface $streamFactory = null,
    ): AppClient {
        $client = new AppClient(
            $context->getActingUserAccessToken(),
            $context->getMattermostSiteUrl(),
            $serializer,
            $client ?? new Psr18Client(),
            $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory(),
            $streamFactory ?? Psr17FactoryDiscovery::findStreamFactory(),
        );

        if ($context->getActingUser() !== null) {
            $client->setUserId($context->getActingUser()->getId());
        }

        return $client;
    }

    private function setUserId(string $getId): static
    {
        $this->userId = $getId;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getMattermostSiteUrl(): string
    {
        return $this->mattermostSiteUrl;
    }

    public function kvSet(string $prefix, string $id, mixed $in): bool
    {
        throw new \Exception('Not implemented yet');
    }

    public function kvGet(string $prefix, string $id): mixed
    {
        throw new \Exception('Not implemented yet');
    }

    public function kvDelete(string $prefix, string $id): bool
    {
        throw new \Exception('Not implemented yet');
    }

    public function createTimer(Timer $timer): Timer
    {
        throw new \Exception('Not implemented yet');
    }

    public function createPost(Post $post): Post
    {
        $request = $this->requestFactory
            ->createRequest(
            'POST',
            $this->mattermostSiteUrl . '/api/v4/posts'
            )
            ->withHeader('Authorization', 'Bearer ' . $this->token)
            ->withHeader('Content-Type', 'application/json')
            ->withBody(
                $this->streamFactory->createStream(
                    $this->serializer->serialize($post, 'json')
                ),
            );

        $response = $this->client->sendRequest($request);
        $contents = $response->getBody()->getContents();

        return $this->serializer->deserialize($contents, Post::class, 'json');
    }

    public function DM(string $userId, string $message)
    {
        return $this->createDMPost($userId, new Post(message: $message));
    }

    public function createDMPost(string $userId, Post $post): Client\Model\DefaultBadRequestResponse|Client\Model\DefaultForbiddenResponse|Client\Model\DefaultUnauthorizedResponse|Client\Model\Post
    {
        $channelEndpoint = new ChannelsEndpoint(
            $this->client,
            $this->requestFactory,
            $this->streamFactory,
        );

        $createChannelResponse = $channelEndpoint->createDirectChannel(new CreateDirectChannelRequest([
            $this->userId,
            $userId,
        ]));

        $postApi = new PostsEndpoint(
            $this->client,
            $this->requestFactory,
            $this->streamFactory,
        );

        return $postApi->createPost(true, new CreatePostRequest());
    }
}
