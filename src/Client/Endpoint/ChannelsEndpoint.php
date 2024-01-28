<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class ChannelsEndpoint
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
     * Get a list of all channels
     * ##### Permissions
     * `manage_system`
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAllChannels(
        /** A group id to exclude channels that are associated with that group via GroupChannel records. This can also be left blank with `not_associated_to_group=`. */
        ?string $not_associated_to_group,
        /** The page to select. */
        ?int $page = 0,
        /** The number of channels per page. */
        ?int $per_page = 0,
        /** Whether to exclude default channels (ex Town Square, Off-Topic) from the results. */
        ?bool $exclude_default_channels = false,
        /** Include channels that have been archived. This correlates to the `DeleteAt` flag being set in the database. */
        ?bool $include_deleted = false,
        /** Appends a total count of returned channels inside the response object - ex: `{ "channels": [], "total_count" : 0 }`. */
        ?bool $include_total_count = false,
        /**
         * If set to true, channels which are part of a data retention policy will be excluded. The `sysconsole_read_compliance` permission is required to use this parameter.
         * __Minimum server version__: 5.35
         */
        ?bool $exclude_policy_constrained = false,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelListWithTeamData|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['not_associated_to_group'] = $not_associated_to_group;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['exclude_default_channels'] = $exclude_default_channels;
        $queryParameters['include_deleted'] = $include_deleted;
        $queryParameters['include_total_count'] = $include_total_count;
        $queryParameters['exclude_policy_constrained'] = $exclude_policy_constrained;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ChannelListWithTeamData::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a channel
     * Create a new channel.
     * ##### Permissions
     * If creating a public channel, `create_public_channel` permission is required. If creating a private channel, `create_private_channel` permission is required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createChannel(
        \CedricZiel\MattermostPhp\Client\Model\CreateChannelRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a direct message channel
     * Create a new direct message channel between two users.
     * ##### Permissions
     * Must be one of the two users and have `create_direct_channel` permission. Having the `manage_system` permission voids the previous requirements.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createDirectChannel(
        \CedricZiel\MattermostPhp\Client\Model\CreateDirectChannelRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/direct';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a group message channel
     * Create a new group message channel to group of users. If the logged in user's id is not included in the list, it will be appended to the end.
     * ##### Permissions
     * Must have `create_group_channel` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createGroupChannel(
        \CedricZiel\MattermostPhp\Client\Model\CreateGroupChannelRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/group';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search all private and open type channels across all teams
     * Returns all private and open type channels where 'term' matches on the name, display name, or purpose of
     * the channel.
     *
     * Configured 'default' channels (ex Town Square and Off-Topic) can be excluded from the results
     * with the `exclude_default_channels` boolean parameter.
     *
     * Channels that are associated (via GroupChannel records) to a given group can be excluded from the results
     * with the `not_associated_to_group` parameter and a group id string.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchAllChannels(
        /**
         * Is the request from system_console. If this is set to true, it filters channels by the logged in user.
         */
        ?bool $system_console = true,
        \CedricZiel\MattermostPhp\Client\Model\SearchAllChannelsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SearchAllChannelsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/channels/search';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['system_console'] = $system_console;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SearchAllChannelsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search Group Channels
     * Get a list of group channels for a user which members' usernames match the search term.
     *
     * __Minimum server version__: 5.14
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchGroupChannels(
        \CedricZiel\MattermostPhp\Client\Model\SearchGroupChannelsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SearchGroupChannelsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/channels/group/search';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SearchGroupChannelsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a list of channels by ids
     * Get a list of public channels on a team by id.
     * ##### Permissions
     * `view_team` for the team the channels are on.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPublicChannelsByIdsForTeam(
        /** Team GUID */
        string $team_id,
        \CedricZiel\MattermostPhp\Client\Model\GetPublicChannelsByIdsForTeamRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GetPublicChannelsByIdsForTeamResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/{team_id}/channels/ids';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetPublicChannelsByIdsForTeamResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get timezones in a channel
     * Get a list of timezones for the users who are in this channel.
     *
     * __Minimum server version__: 5.6
     *
     * ##### Permissions
     * Must have the `read_channel` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelMembersTimezones(
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersTimezonesResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/timezones';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersTimezonesResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a channel
     * Get channel from the provided channel id string.
     * ##### Permissions
     * `read_channel` permission for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannel(
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels/{channel_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a channel
     * Update a channel. The fields that can be updated are listed as parameters. Omitted fields will be treated as blanks.
     * ##### Permissions
     * If updating a public channel, `manage_public_channel_members` permission is required. If updating a private channel, `manage_private_channel_members` permission is required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateChannel(
        /** Channel GUID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateChannelRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels/{channel_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a channel
     * Archives a channel. This will set the `deleteAt` to the current timestamp in the database. Soft deleted channels may not be accessible in the user interface. They can be viewed and unarchived in the **System Console > User Management > Channels** based on your license. Direct and group message channels cannot be deleted.
     *
     * As of server version 5.28, optionally use the `permanent=true` query parameter to permanently delete the channel for compliance reasons. To use this feature `ServiceSettings.EnableAPIChannelDeletion` must be set to `true` in the server's configuration.  If you permanently delete a channel this action is not recoverable outside of a database backup.
     *
     * ##### Permissions
     * `delete_public_channel` permission if the channel is public,
     * `delete_private_channel` permission if the channel is private,
     * or have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteChannel(
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch a channel
     * Partially update a channel by providing only the fields you want to update. Omitted fields will not be updated. The fields that can be updated are defined in the request body, all other provided fields will be ignored.
     * ##### Permissions
     * If updating a public channel, `manage_public_channel_members` permission is required. If updating a private channel, `manage_private_channel_members` permission is required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchChannel(
        /** Channel GUID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchChannelRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels/{channel_id}/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update channel's privacy
     * Updates channel's privacy allowing changing a channel from Public to Private and back.
     *
     * __Minimum server version__: 5.16
     *
     * ##### Permissions
     * `manage_team` permission for the channels team on version < 5.28. `convert_public_channel_to_private` permission for the channel if updating privacy to 'P' on version >= 5.28. `convert_private_channel_to_public` permission for the channel if updating privacy to 'O' on version >= 5.28.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateChannelPrivacy(
        /** Channel GUID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateChannelPrivacyRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels/{channel_id}/privacy';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Restore a channel
     * Restore channel from the provided channel id string.
     *
     * __Minimum server version__: 3.10
     *
     * ##### Permissions
     * `manage_team` permission for the team of the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function restoreChannel(
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels/{channel_id}/restore';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Move a channel
     * Move a channel to another team.
     *
     * __Minimum server version__: 5.26
     *
     * ##### Permissions
     *
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function moveChannel(
        /** Channel GUID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\MoveChannelRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels/{channel_id}/move';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get channel statistics
     * Get statistics for a channel.
     * ##### Permissions
     * Must have the `read_channel` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelStats(
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelStats|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/stats';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ChannelStats::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a channel's pinned posts
     * Get a list of pinned posts for channel.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPinnedPosts(
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\PostList|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/pinned';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PostList::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get public channels
     * Get a page of public channels on a team based on query string parameters - page and per_page.
     * ##### Permissions
     * Must be authenticated and have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPublicChannelsForTeam(
        /** Team GUID */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of public channels per page. */
        ?int $per_page = 60,
    ): \CedricZiel\MattermostPhp\Client\Model\GetPublicChannelsForTeamResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/{team_id}/channels';
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
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetPublicChannelsForTeamResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get private channels
     * Get a page of private channels on a team based on query string
     * parameters - team_id, page and per_page.
     *
     * __Minimum server version__: 5.26
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPrivateChannelsForTeam(
        /** Team GUID */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of private channels per page. */
        ?int $per_page = 60,
    ): \CedricZiel\MattermostPhp\Client\Model\GetPrivateChannelsForTeamResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/{team_id}/channels/private';
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
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetPrivateChannelsForTeamResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get deleted channels
     * Get a page of deleted channels on a team based on query string parameters - team_id, page and per_page.
     *
     * __Minimum server version__: 3.10
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getDeletedChannelsForTeam(
        /** Team GUID */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of public channels per page. */
        ?int $per_page = 60,
    ): \CedricZiel\MattermostPhp\Client\Model\GetDeletedChannelsForTeamResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/{team_id}/channels/deleted';
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
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetDeletedChannelsForTeamResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Autocomplete channels
     * Autocomplete public channels on a team based on the search term provided in the request URL.
     *
     * __Minimum server version__: 4.7
     *
     * ##### Permissions
     * Must have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function autocompleteChannelsForTeam(
        /** Team GUID */
        string $team_id,
        /** Name or display name */
        string $name,
    ): \CedricZiel\MattermostPhp\Client\Model\AutocompleteChannelsForTeamResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/{team_id}/channels/autocomplete';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['name'] = $name;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AutocompleteChannelsForTeamResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Autocomplete channels for search
     * Autocomplete your channels on a team based on the search term provided in the request URL.
     *
     * __Minimum server version__: 5.4
     *
     * ##### Permissions
     * Must have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function autocompleteChannelsForTeamForSearch(
        /** Team GUID */
        string $team_id,
        /** Name or display name */
        string $name,
    ): \CedricZiel\MattermostPhp\Client\Model\AutocompleteChannelsForTeamForSearchResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/{team_id}/channels/search_autocomplete';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['name'] = $name;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AutocompleteChannelsForTeamForSearchResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search channels
     * Search public channels on a team based on the search term provided in the request body.
     * ##### Permissions
     * Must have the `list_team_channels` permission.
     *
     * In server version 5.16 and later, a user without the `list_team_channels` permission will be able to use this endpoint, with the search results limited to the channels that the user is a member of.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchChannels(
        /** Team GUID */
        string $team_id,
        \CedricZiel\MattermostPhp\Client\Model\SearchChannelsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SearchChannelsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/{team_id}/channels/search';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\SearchChannelsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search archived channels
     * Search archived channels on a team based on the search term provided in the request body.
     *
     * __Minimum server version__: 5.18
     *
     * ##### Permissions
     * Must have the `list_team_channels` permission.
     *
     * In server version 5.18 and later, a user without the `list_team_channels` permission will be able to use this endpoint, with the search results limited to the channels that the user is a member of.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchArchivedChannels(
        /** Team GUID */
        string $team_id,
        \CedricZiel\MattermostPhp\Client\Model\SearchArchivedChannelsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SearchArchivedChannelsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/{team_id}/channels/search_archived';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\SearchArchivedChannelsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a channel by name
     * Gets channel from the provided team id and channel name strings.
     * ##### Permissions
     * `read_channel` permission for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelByName(
        /** Team GUID */
        string $team_id,
        /** Channel Name */
        string $channel_name,
        /** Defines if deleted channels should be returned or not (Mattermost Server 5.26.0+) */
        ?bool $include_deleted = false,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/{team_id}/channels/name/{channel_name}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $pathParameters['channel_name'] = $channel_name;
        $queryParameters['include_deleted'] = $include_deleted;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a channel by name and team name
     * Gets a channel from the provided team name and channel name strings.
     * ##### Permissions
     * `read_channel` permission for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelByNameForTeamName(
        /** Team Name */
        string $team_name,
        /** Channel Name */
        string $channel_name,
        /** Defines if deleted channels should be returned or not (Mattermost Server 5.26.0+) */
        ?bool $include_deleted = false,
    ): \CedricZiel\MattermostPhp\Client\Model\Channel|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/teams/name/{team_name}/channels/name/{channel_name}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_name'] = $team_name;
        $pathParameters['channel_name'] = $channel_name;
        $queryParameters['include_deleted'] = $include_deleted;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Channel::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get channel members
     * Get a page of members for a channel.
     * ##### Permissions
     * `read_channel` permission for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelMembers(
        /** Channel GUID */
        string $channel_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of members per page. There is a maximum limit of 200 members. */
        ?int $per_page = 60,
    ): \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/members';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Add user to channel
     * Add a user to a channel by creating a channel member object.
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function addChannelMember(
        /** The channel ID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\AddChannelMemberRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelMember|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/members';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\ChannelMember::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get channel members by ids
     * Get a list of channel members based on the provided user ids.
     * ##### Permissions
     * Must have the `read_channel` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelMembersByIds(
        /** Channel GUID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersByIdsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersByIdsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels/{channel_id}/members/ids';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersByIdsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get channel member
     * Get a channel member.
     * ##### Permissions
     * `read_channel` permission for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelMember(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelMember|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ChannelMember::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Remove user from channel
     * Delete a channel member, effectively removing them from a channel.
     *
     * In server version 5.3 and later, channel members can only be deleted from public or private channels.
     * ##### Permissions
     * `manage_public_channel_members` permission if the channel is public.
     * `manage_private_channel_members` permission if the channel is private.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function removeUserFromChannel(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update channel roles
     * Update a user's roles for a channel.
     * ##### Permissions
     * Must have `manage_channel_roles` permission for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateChannelRoles(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateChannelRolesRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}/roles';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update the scheme-derived roles of a channel member.
     * Update a channel member's scheme_admin/scheme_user properties. Typically this should either be `scheme_admin=false, scheme_user=true` for ordinary channel member, or `scheme_admin=true, scheme_user=true` for a channel admin.
     * __Minimum server version__: 5.0
     * ##### Permissions
     * Must be authenticated and have the `manage_channel_roles` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateChannelMemberSchemeRoles(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateChannelMemberSchemeRolesRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}/schemeRoles';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update channel notifications
     * Update a user's notification properties for a channel. Only the provided fields are updated.
     * ##### Permissions
     * Must be logged in as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateChannelNotifyProps(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateChannelNotifyPropsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}/notify_props';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * View channel
     * Perform all the actions involved in viewing a channel. This includes marking channels as read, clearing push notifications, and updating the active channel.
     * ##### Permissions
     * Must be logged in as user or have `edit_other_users` permission.
     *
     * __Response only includes `last_viewed_at_times` in Mattermost server 4.3 and newer.__
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function viewChannel(
        /** User ID to perform the view action for */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\ViewChannelRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\ViewChannelResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/members/{user_id}/view';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ViewChannelResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get channel memberships and roles for a user
     * Get all channel memberships and associated membership roles (i.e. `channel_user`, `channel_admin`) for a user on a specific team.
     * ##### Permissions
     * Logged in as the user and `view_team` permission for the team. Having `manage_system` permission voids the previous requirements.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelMembersForUser(
        /** User GUID */
        string $user_id,
        /** Team GUID */
        string $team_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/members';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get channels for user
     * Get all the channels on a team for a user.
     * ##### Permissions
     * Logged in as the user, or have `edit_other_users` permission, and `view_team` permission for the team.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelsForTeamForUser(
        /** User GUID */
        string $user_id,
        /** Team GUID */
        string $team_id,
        /** Defines if deleted channels should be returned or not */
        ?bool $include_deleted = false,
        /** Filters the deleted channels by this time in epoch format. Does not have any effect if include_deleted is set to false. */
        ?int $last_delete_at = 0,
    ): \CedricZiel\MattermostPhp\Client\Model\GetChannelsForTeamForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $queryParameters['include_deleted'] = $include_deleted;
        $queryParameters['last_delete_at'] = $last_delete_at;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelsForTeamForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get all channels from all teams
     * Get all channels from all teams that a user is a member of.
     *
     * __Minimum server version__: 6.1
     *
     * ##### Permissions
     *
     * Logged in as the user, or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelsForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** Filters the deleted channels by this time in epoch format. Does not have any effect if include_deleted is set to false. */
        ?int $last_delete_at = 0,
        /** Defines if deleted channels should be returned or not */
        ?bool $include_deleted = false,
    ): \CedricZiel\MattermostPhp\Client\Model\GetChannelsForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/channels';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $queryParameters['last_delete_at'] = $last_delete_at;
        $queryParameters['include_deleted'] = $include_deleted;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelsForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get unread messages
     * Get the total unread messages and mentions for a channel for a user.
     * ##### Permissions
     * Must be logged in as user and have the `read_channel` permission, or have `edit_other_usrs` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelUnread(
        /** User GUID */
        string $user_id,
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelUnread|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/channels/{channel_id}/unread';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ChannelUnread::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Set a channel's scheme
     * Set a channel's scheme, more specifically sets the scheme_id value of a channel record.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 4.10
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateChannelScheme(
        /** Channel GUID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateChannelSchemeRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/channels/{channel_id}/scheme';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Channel members minus group members.
     * Get the set of users who are members of the channel minus the set of users who are members of the given groups.
     * Each user object contains an array of group objects representing the group memberships for that user.
     * Each user object contains the boolean fields `scheme_guest`, `scheme_user`, and `scheme_admin` representing the roles that user has for the given channel.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.14
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function channelMembersMinusGroupMembers(
        /** Channel GUID */
        string $channel_id,
        /** A comma-separated list of group ids. */
        string $group_ids = '',
        /** The page to select. */
        ?int $page = 0,
        /** The number of users per page. */
        ?int $per_page = 0,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/members_minus_group_members';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['group_ids'] = $group_ids;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Channel members counts for each group that has atleast one member in the channel
     * Returns a set of ChannelMemberCountByGroup objects which contain a `group_id`, `channel_member_count` and a `channel_member_timezones_count`.
     * ##### Permissions
     * Must have `read_channel` permission for the given channel.
     * __Minimum server version__: 5.24
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelMemberCountsByGroup(
        /** Channel GUID */
        string $channel_id,
        /** Defines if member timezone counts should be returned or not */
        ?bool $include_timezones = false,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/member_counts_by_group';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['include_timezones'] = $include_timezones;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get information about channel's moderation.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.22
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelModerations(
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetChannelModerationsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/moderations';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelModerationsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a channel's moderation settings.
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.22
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchChannelModerations(
        /** Channel GUID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchChannelModerationsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\PatchChannelModerationsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/moderations/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PatchChannelModerationsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get user's sidebar categories
     * Get a list of sidebar categories that will appear in the user's sidebar on the given team, including a list of channel IDs in each category.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be authenticated and have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSidebarCategoriesForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetSidebarCategoriesForTeamForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetSidebarCategoriesForTeamForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create user's sidebar category
     * Create a custom sidebar category for the user on the given team.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be authenticated and have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createSidebarCategoryForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\CreateSidebarCategoryForTeamForUserRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SidebarCategory|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SidebarCategory::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update user's sidebar categories
     * Update any number of sidebar categories for the user on the given team. This can be used to reorder the channels in these categories.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be authenticated and have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateSidebarCategoriesForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateSidebarCategoriesForTeamForUserRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SidebarCategory|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SidebarCategory::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get user's sidebar category order
     * Returns the order of the sidebar categories for a user on the given team as an array of IDs.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be authenticated and have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSidebarCategoryOrderForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetSidebarCategoryOrderForTeamForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/order';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetSidebarCategoryOrderForTeamForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update user's sidebar category order
     * Updates the order of the sidebar categories for a user on the given team. The provided array must include the IDs of all categories on the team.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be authenticated and have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateSidebarCategoryOrderForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateSidebarCategoryOrderForTeamForUserRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\UpdateSidebarCategoryOrderForTeamForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/order';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UpdateSidebarCategoryOrderForTeamForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get sidebar category
     * Returns a single sidebar category for the user on the given team.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be authenticated and have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSidebarCategoryForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
        /** Category GUID */
        string $category_id,
    ): \CedricZiel\MattermostPhp\Client\Model\SidebarCategory|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/{category_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        $pathParameters['category_id'] = $category_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SidebarCategory::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update sidebar category
     * Updates a single sidebar category for the user on the given team.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be authenticated and have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateSidebarCategoryForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
        /** Category GUID */
        string $category_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateSidebarCategoryForTeamForUserRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SidebarCategory|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/{category_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        $pathParameters['category_id'] = $category_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SidebarCategory::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete sidebar category
     * Deletes a single sidebar category for the user on the given team. Only custom categories can be deleted.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must be authenticated and have the `list_team_channels` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function removeSidebarCategoryForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
        /** Category GUID */
        string $category_id,
    ): \CedricZiel\MattermostPhp\Client\Model\SidebarCategory|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/{category_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        $pathParameters['category_id'] = $category_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SidebarCategory::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }
}
