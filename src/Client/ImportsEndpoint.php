<?php

namespace CedricZiel\MattermostPhp\Client;

class ImportsEndpoint
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
     * List import files
     */
    public function listImports(): array
    {
        $path = '/api/v4/imports';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;