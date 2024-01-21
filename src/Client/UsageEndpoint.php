<?php

namespace CedricZiel\MattermostPhp\Client;

class UsageEndpoint
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
     * Get current usage of posts
     */
    public function getPostsUsage(): array
    {
        $path = '/api/v4/usage/posts';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get the total file storage usage for the instance in bytes.
     */
    public function getStorageUsage(): array
    {
        $path = '/api/v4/usage/storage';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;