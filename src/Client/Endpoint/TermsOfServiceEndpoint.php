<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class TermsOfServiceEndpoint
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
     * Get latest terms of service
     * Get latest terms of service from the server
     *
     * __Minimum server version__: 5.4
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getTermsOfService(): array
    {
        $path = '/api/v4/terms_of_service';
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
     * Creates a new terms of service
     * Creates new terms of service
     *
     * __Minimum server version__: 5.4
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createTermsOfService(): array
    {
        $path = '/api/v4/terms_of_service';
        $method = 'post';
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
