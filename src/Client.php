<?php

namespace CedricZiel\MattermostPhp;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class Client
{
    public function __construct(
        protected ClientInterface         $client,
        protected RequestFactoryInterface $requestFactory,
        protected StreamFactoryInterface  $streamFactory,
        protected ?string                 $baseUri = null,
        protected ?string                 $token = null,
    ) {
    }

    public function get(string $path): ResponseInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'GET',
                $this->baseUri . $path,
            )
            ->withHeader('Authorization', 'Bearer ' . $this->token);

        return $this->client->sendRequest($request);
    }

    public function setToken(?string $token): static
    {
        $this->token = $token;

        return $this;
    }

    public function post(string $path, string $body): ResponseInterface
    {
        $request = $this->requestFactory
            ->createRequest(
                'POST',
                $this->baseUri . $path,
            )
            ->withHeader('Content-Type', 'application/json')
            ->withBody($this->streamFactory->createStream($body));

        /**
         * We don't have a token yet, so we can't set the Authorization header.
         */
        if (!str_ends_with('/users/login', $path)) {
            $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        }

        return $this->client->sendRequest($request);
    }
}
