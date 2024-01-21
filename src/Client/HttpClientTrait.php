<?php

namespace CedricZiel\MattermostPhp\Client;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;

trait HttpClientTrait
{
    protected ClientInterface $httpClient;

    protected RequestFactoryInterface $requestFactory;

    public function setHttpClient(ClientInterface $httpClient): static
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function setRequestFactory(RequestFactoryInterface $requestFactory): static
    {
        $this->requestFactory = $requestFactory;

        return $this;
    }

    /**
     * @param ResponseInterface $response
     * @param array<int, string> $map
     * @return object
     */
    protected function mapResponse(ResponseInterface $response, array $map): object
    {
        $responseCode = $response->getStatusCode();

        if (!in_array($responseCode, $map, true)) {
            throw new \RuntimeException(sprintf('Expected status code 200, got %d', $response->getStatusCode()));
        }

        $body = json_decode($response->getBody(), true);
        $responseObject = new $map[$responseCode];
        $responseObject->hydrate($body);

        return $responseObject;
    }

    public function buildUri(string $path, array $pathParameters = [], array $queryParameters = []): string
    {
        $uri = $this->baseUrl . $path;

        $uri = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $uri);

        return sprintf('%s?%s', $uri, http_build_query($queryParameters));
    }
}
