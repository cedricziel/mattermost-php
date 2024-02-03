<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class GroupsEndpoint
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
     * Delete a link for LDAP group
     * ##### Permissions
     * Must have `manage_system` permission.
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function unlinkLdapGroup(
        /** Group GUID */
        string $remote_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['remote_id'] = $remote_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/ldap/groups/{remote_id}/link', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get groups
     * Retrieve a list of all groups not associated to a particular channel or team.
     *
     * `not_associated_to_team` **OR** `not_associated_to_channel` is required.
     *
     * If you use `not_associated_to_team`, you must be a team admin for that particular team (permission to manage that team).
     *
     * If you use `not_associated_to_channel`, you must be a channel admin for that particular channel (permission to manage that channel).
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\Group[]
     */
    public function getGroups(
        /** Team GUID which is used to return all the groups not associated to this team */
        string $not_associated_to_team,
        /** Group GUID which is used to return all the groups not associated to this channel */
        string $not_associated_to_channel,
        /** The page to select. */
        ?int $page = 0,
        /** The number of groups per page. */
        ?int $per_page = 60,
        /** String to pattern match the `name` and `display_name` field. Will return all groups whose `name` and `display_name` field match any of the text. */
        ?string $q = null,
        /** Boolean which adds the `member_count` attribute to each group JSON object */
        ?bool $include_member_count = null,
        /**
         * Only return groups that have been modified since the given Unix timestamp (in milliseconds). All modified groups, including deleted and created groups, will be returned.
         * __Minimum server version__: 5.24
         */
        ?int $since = null,
        /** Boolean which filters the group entries with the `allow_reference` attribute set. */
        ?bool $filter_allow_reference = false,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['q'] = $q;
        $queryParameters['include_member_count'] = $include_member_count;
        $queryParameters['not_associated_to_team'] = $not_associated_to_team;
        $queryParameters['not_associated_to_channel'] = $not_associated_to_channel;
        $queryParameters['since'] = $since;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Group::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a custom group
     * Create a `custom` type group.
     *
     * #### Permission
     * Must have `create_custom_group` permission.
     *
     * __Minimum server version__: 6.3
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createGroup(
        \CedricZiel\MattermostPhp\Client\Model\CreateGroupRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a group
     * Get group from the provided group id string
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getGroup(
        /** Group GUID */
        string $group_id,
    ): \CedricZiel\MattermostPhp\Client\Model\Group|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Group::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Deletes a custom group
     * Soft deletes a custom group.
     *
     * ##### Permissions
     * Must have `custom_group_delete` permission for the given group.
     *
     * __Minimum server version__: 6.3
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteGroup(
        /** The ID of the group. */
        string $group_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch a group
     * Partially update a group by providing only the fields you want to update. Omitted fields will not be updated. The fields that can be updated are defined in the request body, all other provided fields will be ignored.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchGroup(
        /** Group GUID */
        string $group_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchGroupRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Group|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/patch', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Group::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Restore a previously deleted group.
     * Restores a previously deleted custom group, allowing it to be used normally.
     * May not be used with LDAP groups.
     * ##### Permissions Must have `restore_custom_group` permission for the given group.
     * __Minimum server version__: 7.7
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function restoreGroup(
        /** Group GUID */
        string $group_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/restore', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

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
     * Link a team to a group
     * Link a team to a group
     * ##### Permissions
     * Must have `manage_team` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function linkGroupSyncableForTeam(
        /** Group GUID */
        string $group_id,
        /** Team GUID */
        string $team_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeam|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/teams/{team_id}/link', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeam::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a link from a team to a group
     * Delete a link from a team to a group
     * ##### Permissions
     * Must have `manage_team` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function unlinkGroupSyncableForTeam(
        /** Group GUID */
        string $group_id,
        /** Team GUID */
        string $team_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/teams/{team_id}/link', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

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
     * Link a channel to a group
     * Link a channel to a group
     * ##### Permissions
     * If the channel is private, you must have `manage_private_channel_members` permission.
     * Otherwise, you must have the `manage_public_channel_members` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function linkGroupSyncableForChannel(
        /** Group GUID */
        string $group_id,
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/channels/{channel_id}/link', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a link from a channel to a group
     * Delete a link from a channel to a group
     * ##### Permissions
     * If the channel is private, you must have `manage_private_channel_members` permission.
     * Otherwise, you must have the `manage_public_channel_members` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function unlinkGroupSyncableForChannel(
        /** Group GUID */
        string $group_id,
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/channels/{channel_id}/link', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

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
     * Get GroupSyncable from Team ID
     * Get the GroupSyncable object with group_id and team_id from params
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getGroupSyncableForTeamId(
        /** Group GUID */
        string $group_id,
        /** Team GUID */
        string $team_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeam|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/teams/{team_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeam::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get GroupSyncable from channel ID
     * Get the GroupSyncable object with group_id and channel_id from params
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getGroupSyncableForChannelId(
        /** Group GUID */
        string $group_id,
        /** Channel GUID */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/channels/{channel_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get group teams
     * Retrieve the list of teams associated to the group
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeams[]
     */
    public function getGroupSyncablesTeams(
        /** Group GUID */
        string $group_id,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/teams', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeams::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get group channels
     * Retrieve the list of channels associated to the group
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannels[]
     */
    public function getGroupSyncablesChannels(
        /** Group GUID */
        string $group_id,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/channels', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannels::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch a GroupSyncable associated to Team
     * Partially update a GroupSyncable by providing only the fields you want to update. Omitted fields will not be updated. The fields that can be updated are defined in the request body, all other provided fields will be ignored.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchGroupSyncableForTeam(
        /** Group GUID */
        string $group_id,
        /** Team GUID */
        string $team_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchGroupSyncableForTeamRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeam|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/teams/{team_id}/patch', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeam::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch a GroupSyncable associated to Channel
     * Partially update a GroupSyncable by providing only the fields you want to update. Omitted fields will not be updated. The fields that can be updated are defined in the request body, all other provided fields will be ignored.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchGroupSyncableForChannel(
        /** Group GUID */
        string $group_id,
        /** Channel GUID */
        string $channel_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchGroupSyncableForChannelRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannel|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/channels/{channel_id}/patch', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannel::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get group users
     * Retrieve the list of users associated with a given group.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getGroupUsers(
        /** Group GUID */
        string $group_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of groups per page. */
        ?int $per_page = 60,
    ): \CedricZiel\MattermostPhp\Client\Model\GetGroupUsersResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/members', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetGroupUsersResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Removes members from a custom group
     * Soft deletes a custom group members.
     *
     * ##### Permissions
     * Must have `custom_group_manage_members` permission for the given group.
     *
     * __Minimum server version__: 6.3
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteGroupMembers(
        /** The ID of the group to delete. */
        string $group_id,
        \CedricZiel\MattermostPhp\Client\Model\DeleteGroupMembersRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/members', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Adds members to a custom group
     * Adds members to a custom group.
     *
     * ##### Permissions
     * Must have `custom_group_manage_members` permission for the given group.
     *
     * __Minimum server version__: 6.3
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function addGroupMembers(
        /** The ID of the group. */
        string $group_id,
        \CedricZiel\MattermostPhp\Client\Model\AddGroupMembersRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/members', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get group stats
     * Retrieve the stats of a given group.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.26
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getGroupStats(
        /** Group GUID */
        string $group_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetGroupStatsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/groups/{group_id}/stats', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetGroupStatsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get channel groups
     * Retrieve the list of groups associated with a given channel.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\Group[]
     */
    public function getGroupsByChannel(
        /** Channel GUID */
        string $channel_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of groups per page. */
        ?int $per_page = 60,
        /** Boolean which filters the group entries with the `allow_reference` attribute set. */
        ?bool $filter_allow_reference = false,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/channels/{channel_id}/groups', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Group::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get team groups
     * Retrieve the list of groups associated with a given team.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\Group[]
     */
    public function getGroupsByTeam(
        /** Team GUID */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of groups per page. */
        ?int $per_page = 60,
        /** Boolean which filters in the group entries with the `allow_reference` attribute set. */
        ?bool $filter_allow_reference = false,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/teams/{team_id}/groups', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Group::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get team groups by channels
     * Retrieve the set of groups associated with the channels in the given team grouped by channel.
     *
     * ##### Permissions
     * Must have `manage_system` permission or can access only for current user
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getGroupsAssociatedToChannelsByTeam(
        /** Team GUID */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of groups per page. */
        ?int $per_page = 60,
        /** Boolean which filters in the group entries with the `allow_reference` attribute set. */
        ?bool $filter_allow_reference = false,
        /** Boolean to determine whether the pagination should be applied or not */
        ?bool $paginate = false,
    ): \CedricZiel\MattermostPhp\Client\Model\GetGroupsAssociatedToChannelsByTeamResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;
        $queryParameters['paginate'] = $paginate;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/teams/{team_id}/groups_by_channels', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetGroupsAssociatedToChannelsByTeamResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get groups for a userId
     * Retrieve the list of groups associated to the user
     *
     * __Minimum server version__: 5.24
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\Group[]
     */
    public function getGroupsByUserId(
        /** User GUID */
        string $user_id,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/users/{user_id}/groups', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Group::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }
}
