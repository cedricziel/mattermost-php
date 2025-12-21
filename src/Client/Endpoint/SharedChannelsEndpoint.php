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
     * Get all shared channels for team.
     * Get all shared channels for a team.
     *
     * __Minimum server version__: 5.50
     *
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\SharedChannel[]
     */
    public function getAllSharedChannels(
        /** Team Id */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of sharedchannels per page. */
        ?int $per_page = 0,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/sharedchannels/{team_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SharedChannel::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get shared channel remotes by remote cluster.
     * Get a list of the channels shared with a given remote cluster
     * and their status.
     *
     * ##### Permissions
     * `manage_secure_connections`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\SharedChannelRemote[]
     */
    public function getSharedChannelRemotesByRemoteCluster(
        /** The remote cluster GUID */
        string $remote_id,
        /** Include those Shared channel remotes that are unconfirmed */
        ?bool $include_unconfirmed = null,
        /** Show only those Shared channel remotes that are not confirmed yet */
        ?bool $exclude_confirmed = null,
        /** Show only those Shared channel remotes that were shared with this server */
        ?bool $exclude_home = null,
        /** Show only those Shared channel remotes that were shared from this server */
        ?bool $exclude_remote = null,
        /** Include those Shared channel remotes that have been deleted */
        ?bool $include_deleted = null,
        /** The page to select */
        ?int $page = null,
        /** The number of shared channels per page */
        ?int $per_page = null,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;
        $queryParameters['include_unconfirmed'] = $include_unconfirmed;
        $queryParameters['exclude_confirmed'] = $exclude_confirmed;
        $queryParameters['exclude_home'] = $exclude_home;
        $queryParameters['exclude_remote'] = $exclude_remote;
        $queryParameters['include_deleted'] = $include_deleted;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster/{remote_id}/sharedchannelremotes', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SharedChannelRemote::class . '[]';
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
    ): \CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/sharedchannels/remote_info/{remote_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Invites a remote cluster to a channel.
     * Invites a remote cluster to a channel, sharing the channel if
     * needed. If the remote cluster was already invited to the
     * channel, calling this endpoint will have no effect.
     *
     * ##### Permissions
     * `manage_shared_channels`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function inviteRemoteClusterToChannel(
        /** The remote cluster GUID */
        string $remote_id,
        /** The channel GUID to invite the remote cluster to */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster/{remote_id}/channels/{channel_id}/invite', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Uninvites a remote cluster to a channel.
     * Stops sharing a channel with a remote cluster. If the channel
     * was not shared with the remote, calling this endpoint will
     * have no effect.
     *
     * ##### Permissions
     * `manage_shared_channels`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function uninviteRemoteClusterToChannel(
        /** The remote cluster GUID */
        string $remote_id,
        /** The channel GUID to uninvite the remote cluster to */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/remotecluster/{remote_id}/channels/{channel_id}/uninvite', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get remote clusters for a shared channel
     * Gets the remote clusters information for a shared channel.
     *
     * __Minimum server version__: 10.11
     *
     * ##### Permissions
     * Must be authenticated and have the `read_channel` permission for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo[]
     */
    public function getSharedChannelRemotes(
        /** Channel GUID */
        string $channel_id,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/sharedchannels/{channel_id}/remotes', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Check if user can DM another user in shared channels context
     * Checks if a user can send direct messages to another user, considering shared channel restrictions.
     * This is specifically for shared channels where DMs require direct connections between clusters.
     *
     * __Minimum server version__: 10.11
     *
     * ##### Permissions
     * Must be authenticated and have permission to view the user.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function canUserDirectMessage(
        /** User GUID */
        string $user_id,
        /** Other user GUID */
        string $other_user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\CanUserDirectMessageResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['other_user_id'] = $other_user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/sharedchannels/users/{user_id}/can_dm/{other_user_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\CanUserDirectMessageResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }
}
