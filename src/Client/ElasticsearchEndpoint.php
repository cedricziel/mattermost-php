<?php

namespace CedricZiel\MattermostPhp\Client;

class ElasticsearchEndpoint
{
    public function __construct(
        protected string $baseUrl,
        protected \Psr\Http\Client\ClientInterface $httpClient,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Test Elasticsearch configuration
     */
    public function testElasticsearch(): array
    {
        $path = '/api/v4/elasticsearch/test';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Purge all Elasticsearch indexes
     */
    public function purgeElasticsearchIndexes(): array
    {
        $path = '/api/v4/elasticsearch/purge_indexes';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;