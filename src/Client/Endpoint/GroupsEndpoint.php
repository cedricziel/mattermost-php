<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class GroupsEndpoint
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
    ): array
    {
        $path = '/api/v4/ldap/groups/{remote_id}/link';
        $method = 'delete';
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
     */
    public function getGroups(
        /** The page to select. */
        ?int $page = 0,
        /** The number of groups per page. */
        ?int $per_page = 60,
        /** String to pattern match the `name` and `display_name` field. Will return all groups whose `name` and `display_name` field match any of the text. */
        ?string $q,
        /** Boolean which adds the `member_count` attribute to each group JSON object */
        ?bool $include_member_count,
        /** Team GUID which is used to return all the groups not associated to this team */
        string $not_associated_to_team,
        /** Group GUID which is used to return all the groups not associated to this channel */
        string $not_associated_to_channel,
        /**
         * Only return groups that have been modified since the given Unix timestamp (in milliseconds). All modified groups, including deleted and created groups, will be returned.
         * __Minimum server version__: 5.24
         */
        ?int $since,
        /** Boolean which filters the group entries with the `allow_reference` attribute set. */
        ?bool $filter_allow_reference = false,
    ): array
    {
        $path = '/api/v4/groups';
        $method = 'get';
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
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    public function createGroup(\CreateGroupRequest $requestBody): array
    {
        $path = '/api/v4/groups';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
        \PatchGroupRequest $requestBody,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}/restore';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams/{team_id}/link';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams/{team_id}/link';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels/{channel_id}/link';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels/{channel_id}/link';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams/{team_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels/{channel_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
     */
    public function getGroupSyncablesTeams(
        /** Group GUID */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
     */
    public function getGroupSyncablesChannels(
        /** Group GUID */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
        \PatchGroupSyncableForTeamRequest $requestBody,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams/{team_id}/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
        \PatchGroupSyncableForChannelRequest $requestBody,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels/{channel_id}/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}/members';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;
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
        \DeleteGroupMembersRequest $requestBody,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/members';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
        \AddGroupMembersRequest $requestBody,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/members';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/groups/{group_id}/stats';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['group_id'] = $group_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/groups';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get team groups
     * Retrieve the list of groups associated with a given team.
     *
     * __Minimum server version__: 5.11
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
    ): array
    {
        $path = '/api/v4/teams/{team_id}/groups';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/teams/{team_id}/groups_by_channels';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;
        $queryParameters['paginate'] = $paginate;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get groups for a userId
     * Retrieve the list of groups associated to the user
     *
     * __Minimum server version__: 5.24
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getGroupsByUserId(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/groups';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
