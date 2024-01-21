<?php

namespace CedricZiel\MattermostPhp\Client;

class TermsOfServiceEndpoint
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
     * Get latest terms of service
     */
    public function getTermsOfService(): array
    {
        $path = '/api/v4/terms_of_service';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Creates a new terms of service
     */
    public function createTermsOfService(): array
    {
        $path = '/api/v4/terms_of_service';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;