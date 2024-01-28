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
    public function getPostsUsage(
    ): \CedricZiel\MattermostPhp\Client\Model\GetPostsUsageResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse
    {
        $path = '/api/v4/usage/posts';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetPostsUsageResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
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
    public function getStorageUsage(
    ): \CedricZiel\MattermostPhp\Client\Model\GetStorageUsageResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse
    {
        $path = '/api/v4/usage/storage';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetStorageUsageResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }
}
