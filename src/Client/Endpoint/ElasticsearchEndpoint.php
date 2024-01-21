<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class ElasticsearchEndpoint
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
     * Test Elasticsearch configuration
     * Test the current Elasticsearch configuration to see if the Elasticsearch server can be contacted successfully.
     * Optionally provide a configuration in the request body to test. If no valid configuration is present in the
     * request body the current server configuration will be tested.
     *
     * __Minimum server version__: 4.1
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function testElasticsearch(): array
    {
        $path = '/api/v4/elasticsearch/test';
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

    /**
     * Purge all Elasticsearch indexes
     * Deletes all Elasticsearch indexes and their contents. After calling this endpoint, it is
     * necessary to schedule a new Elasticsearch indexing job to repopulate the indexes.
     * __Minimum server version__: 4.1
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function purgeElasticsearchIndexes(): array
    {
        $path = '/api/v4/elasticsearch/purge_indexes';
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
