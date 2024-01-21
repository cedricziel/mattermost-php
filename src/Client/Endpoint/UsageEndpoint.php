<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class UsageEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Get current usage of posts
     * Retrieve rounded off total no. of posts for this instance. Example: returns 4000 instead of 4321
     * ##### Permissions
     * Must be authenticated.
     * __Minimum server version__: 7.0
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPostsUsage(): array
    {
        $path = '/api/v4/usage/posts';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get the total file storage usage for the instance in bytes.
     * Get the total file storage usage for the instance in bytes rounded down to the most significant digit. Example: returns 4000 instead of 4321
     * ##### Permissions
     * Must be authenticated.
     * __Minimum server version__: 7.1
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getStorageUsage(): array
    {
        $path = '/api/v4/usage/storage';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
