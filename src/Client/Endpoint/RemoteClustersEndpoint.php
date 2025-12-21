<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class RemoteClustersEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        protected string $token,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
        ?\Psr\Http\Message\StreamFactoryInterface $streamFactory = null,
    ) {
        $this->httpClient = $httpClient ?? \Http\Discovery\Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?? \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
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
     * Get a list of remote clusters.
     * Get a list of remote clusters.
     *
     * ##### Permissions
     * `manage_secure_connections`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\RemoteCluster[]
     */
    public function getRemoteClusters(
        /** The page to select */
        ?int $page = null,
        /** The number of remote clusters per page */
        ?int $per_page = null,
        /** Exclude offline remote clusters */
        ?bool $exclude_offline = null,
        /** Select remote clusters in channel */
        ?string $in_channel = null,
        /** Select remote clusters not in this channel */
        ?string $not_in_channel = null,
        /** Select only remote clusters already confirmed */
        ?bool $only_confirmed = null,
        /** Select only remote clusters that belong to a plugin */
        ?bool $only_plugins = null,
        /** Select only remote clusters that don't belong to a plugin */
        ?bool $exclude_plugins = null,
        /** Include those remote clusters that have been deleted */
        ?bool $include_deleted = null,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['exclude_offline'] = $exclude_offline;
        $queryParameters['in_channel'] = $in_channel;
        $queryParameters['not_in_channel'] = $not_in_channel;
        $queryParameters['only_confirmed'] = $only_confirmed;
        $queryParameters['only_plugins'] = $only_plugins;
        $queryParameters['exclude_plugins'] = $exclude_plugins;
        $queryParameters['include_deleted'] = $include_deleted;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\RemoteCluster::class . '[]';
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a new remote cluster.
     * Create a new remote cluster and generate an invite code.
     *
     * ##### Permissions
     * `manage_secure_connections`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createRemoteCluster(
        \CedricZiel\MattermostPhp\Client\Model\CreateRemoteClusterRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\CreateRemoteClusterResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\CreateRemoteClusterResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a remote cluster.
     * Get the Remote Cluster details from the provided id string.
     *
     * ##### Permissions
     * `manage_secure_connections`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getRemoteCluster(
        /** Remote Cluster GUID */
        string $remote_id,
    ): \CedricZiel\MattermostPhp\Client\Model\RemoteCluster|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster/{remote_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\RemoteCluster::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch a remote cluster.
     * Partially update a Remote Cluster by providing only the fields you want to update. Ommited fields will not be updated.
     *
     * ##### Permissions
     * `manage_secure_connections`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchRemoteCluster(
        /** Remote Cluster GUID */
        string $remote_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchRemoteClusterRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\RemoteCluster|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster/{remote_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PATCH', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\RemoteCluster::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a remote cluster.
     * Deletes a Remote Cluster.
     *
     * ##### Permissions
     * `manage_secure_connections`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteRemoteCluster(
        /** Remote Cluster GUID */
        string $remote_id,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster/{remote_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Generate invite code.
     * Generates an invite code for a given remote cluster.
     *
     * ##### Permissions
     * `manage_secure_connections`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function generateRemoteClusterInvite(
        \CedricZiel\MattermostPhp\Client\Model\GenerateRemoteClusterInviteRequest $requestBody,
    ): string|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster/{remote_id}/generate_invite', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Accept a remote cluster invite code.
     * Accepts a remote cluster invite code.
     *
     * ##### Permissions
     * `manage_secure_connections`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function acceptRemoteClusterInvite(
        \CedricZiel\MattermostPhp\Client\Model\AcceptRemoteClusterInviteRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\RemoteCluster|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster/accept_invite', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\RemoteCluster::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }
}
