<?php

namespace CedricZiel\MattermostPhp\Client;

class SharedChannelsEndpoint
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
     * Get all shared channels for team.
     */
    public function getAllSharedChannels(
        /** Team Id */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of sharedchannels per page. */
        ?int $per_page = 0,
    ): array
    {
        $path = '/api/v4/sharedchannels/{team_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get remote cluster info by ID for user.
     */
    public function getRemoteClusterInfo(
        /** Remote Cluster GUID */
        string $remote_id,
    ): array
    {
        $path = '/api/v4/sharedchannels/remote_info/{remote_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['remote_id'] = $remote_id;
        return [];
    }
}
;