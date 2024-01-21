<?php

namespace CedricZiel\MattermostPhp\Client;

class BrandEndpoint
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
     * Get brand image
     */
    public function getBrandImage(): array
    {
        $path = '/api/v4/brand/image';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Upload brand image
     */
    public function uploadBrandImage(): array
    {
        $path = '/api/v4/brand/image';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Delete current brand image
     */
    public function deleteBrandImage(): array
    {
        $path = '/api/v4/brand/image';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;