<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class SharedChannelsEndpoint
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
     * Get all shared channels for team.
     * Get all shared channels for a team.
     *
     * __Minimum server version__: 5.50
     *
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get remote cluster info by ID for user.
     * Get remote cluster info based on remoteId.
     *
     * __Minimum server version__: 5.50
     *
     * ##### Permissions
     * Must be authenticated and user must belong to at least one channel shared with the remote cluster.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getRemoteClusterInfo(
        /** Remote Cluster GUID */
        string $remote_id,
    ): array
    {
        $path = '/api/v4/sharedchannels/remote_info/{remote_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}