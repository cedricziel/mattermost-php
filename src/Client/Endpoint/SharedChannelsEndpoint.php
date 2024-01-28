<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class SharedChannelsEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        protected string $token,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
    ) {
        $this->httpClient = $httpClient ?? \Http\Discovery\Psr18ClientDiscovery::find();
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function setToken(string $token): static
    {
        $this->token = $token;
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
    ): \CedricZiel\MattermostPhp\Client\Model\GetAllSharedChannelsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/sharedchannels/{team_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetAllSharedChannelsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/sharedchannels/remote_info/{remote_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }
}
