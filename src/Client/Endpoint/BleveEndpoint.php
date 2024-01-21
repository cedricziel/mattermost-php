<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class BleveEndpoint
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
     * Purge all Bleve indexes
     * Deletes all Bleve indexes and their contents. After calling this endpoint, it is
     * necessary to schedule a new Bleve indexing job to repopulate the indexes.
     * __Minimum server version__: 5.24
     * ##### Permissions
     * Must have `sysconsole_write_experimental` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function purgeBleveIndexes(): array
    {
        $path = '/api/v4/bleve/purge_indexes';
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
