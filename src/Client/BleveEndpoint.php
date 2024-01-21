<?php

namespace CedricZiel\MattermostPhp\Client;

class BleveEndpoint
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
     * Purge all Bleve indexes
     */
    public function purgeBleveIndexes(): array
    {
        $path = '/api/v4/bleve/purge_indexes';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;