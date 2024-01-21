<?php

namespace CedricZiel\MattermostPhp\Client;

class ClusterEndpoint
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
     * Get cluster status
     */
    public function getClusterStatus(): array
    {
        $path = '/api/v4/cluster/status';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;