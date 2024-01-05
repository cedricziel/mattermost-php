<?php

namespace CedricZiel\MattermostPhp;

use Psr\Http\Client\ClientInterface;

class AppClient
{
    protected Context $context;
    protected ?string $userId;

    public function __construct(
        protected string $token,
        protected string $mattermostSiteUrl,
        ?ClientInterface $client = null,
    ) {
    }

    public static function asBot(
        Context          $context,
        ?ClientInterface $client = null,
    ): AppClient {
        return new AppClient(
            $context->getBotAccessToken(),
            $context->getMattermostSiteUrl(),
            $client,
        );
    }

    public static function asActingUser(
        Context          $context,
        ?ClientInterface $client = null,
    )
    {
        $client = new AppClient(
            $context->getActingUserAccessToken(),
            $context->getMattermostSiteUrl(),
            $client,
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

    public function KVSet(string $prefix, string $id, mixed $in): bool
    {
        throw new \Exception('Not implemented yet');
    }

    public function KVGet(string $prefix, string $id): mixed
    {
        throw new \Exception('Not implemented yet');
    }

    public function KVDelete(string $prefix, string $id): bool
    {
        throw new \Exception('Not implemented yet');
    }
}
