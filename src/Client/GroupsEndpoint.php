<?php

namespace CedricZiel\MattermostPhp\Client;

class GroupsEndpoint
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
     * Delete a link for LDAP group
     */
    public function unlinkLdapGroup(
        /** Group GUID */
        string $remote_id,
    ): array
    {
        $path = '/api/v4/ldap/groups/{remote_id}/link';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['remote_id'] = $remote_id;
        return [];
    }

    /**
     * Get groups
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
        return [];
    }

    /**
     * Create a custom group
     */
    public function createGroup(): array
    {
        $path = '/api/v4/groups';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a group
     */
    public function getGroup(
        /** Group GUID */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        return [];
    }

    /**
     * Deletes a custom group
     */
    public function deleteGroup(
        /** The ID of the group. */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        return [];
    }

    /**
     * Patch a group
     */
    public function patchGroup(
        /** Group GUID */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        return [];
    }

    /**
     * Restore a previously deleted group.
     */
    public function restoreGroup(
        /** Group GUID */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/restore';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        return [];
    }

    /**
     * Link a team to a group
     */
    public function linkGroupSyncableForTeam(
        /** Group GUID */
        string $group_id,
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams/{team_id}/link';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Delete a link from a team to a group
     */
    public function unlinkGroupSyncableForTeam(
        /** Group GUID */
        string $group_id,
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams/{team_id}/link';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Link a channel to a group
     */
    public function linkGroupSyncableForChannel(
        /** Group GUID */
        string $group_id,
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels/{channel_id}/link';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Delete a link from a channel to a group
     */
    public function unlinkGroupSyncableForChannel(
        /** Group GUID */
        string $group_id,
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels/{channel_id}/link';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get GroupSyncable from Team ID
     */
    public function getGroupSyncableForTeamId(
        /** Group GUID */
        string $group_id,
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams/{team_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Get GroupSyncable from channel ID
     */
    public function getGroupSyncableForChannelId(
        /** Group GUID */
        string $group_id,
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels/{channel_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get group teams
     */
    public function getGroupSyncablesTeams(
        /** Group GUID */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        return [];
    }

    /**
     * Get group channels
     */
    public function getGroupSyncablesChannels(
        /** Group GUID */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        return [];
    }

    /**
     * Patch a GroupSyncable associated to Team
     */
    public function patchGroupSyncableForTeam(
        /** Group GUID */
        string $group_id,
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/teams/{team_id}/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Patch a GroupSyncable associated to Channel
     */
    public function patchGroupSyncableForChannel(
        /** Group GUID */
        string $group_id,
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/channels/{channel_id}/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get group users
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Removes members from a custom group
     */
    public function deleteGroupMembers(
        /** The ID of the group to delete. */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        return [];
    }

    /**
     * Adds members to a custom group
     */
    public function addGroupMembers(
        /** The ID of the group. */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        return [];
    }

    /**
     * Get group stats
     */
    public function getGroupStats(
        /** Group GUID */
        string $group_id,
    ): array
    {
        $path = '/api/v4/groups/{group_id}/stats';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['group_id'] = $group_id;
        return [];
    }

    /**
     * Get channel groups
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;
        return [];
    }

    /**
     * Get team groups
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;
        return [];
    }

    /**
     * Get team groups by channels
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['filter_allow_reference'] = $filter_allow_reference;
        $queryParameters['paginate'] = $paginate;
        return [];
    }

    /**
     * Get groups for a userId
     */
    public function getGroupsByUserId(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/groups';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }
}
;