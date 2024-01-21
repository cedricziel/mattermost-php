<?php

namespace CedricZiel\MattermostPhp\Client;

class ChannelsEndpoint
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
     * Get a list of all channels
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
    ): array
    {
        $path = '/api/v4/channels';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['not_associated_to_group'] = $not_associated_to_group;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['exclude_default_channels'] = $exclude_default_channels;
        $queryParameters['include_deleted'] = $include_deleted;
        $queryParameters['include_total_count'] = $include_total_count;
        $queryParameters['exclude_policy_constrained'] = $exclude_policy_constrained;
        return [];
    }

    /**
     * Create a channel
     */
    public function createChannel(): array
    {
        $path = '/api/v4/channels';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Create a direct message channel
     */
    public function createDirectChannel(): array
    {
        $path = '/api/v4/channels/direct';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Create a group message channel
     */
    public function createGroupChannel(): array
    {
        $path = '/api/v4/channels/group';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Search all private and open type channels across all teams
     */
    public function searchAllChannels(
        /**
         * Is the request from system_console. If this is set to true, it filters channels by the logged in user.
         */
        ?bool $system_console = true,
    ): array
    {
        $path = '/api/v4/channels/search';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['system_console'] = $system_console;
        return [];
    }

    /**
     * Search Group Channels
     */
    public function searchGroupChannels(): array
    {
        $path = '/api/v4/channels/group/search';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a list of channels by ids
     */
    public function getPublicChannelsByIdsForTeam(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/channels/ids';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Get timezones in a channel
     */
    public function getChannelMembersTimezones(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/timezones';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get a channel
     */
    public function getChannel(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Update a channel
     */
    public function updateChannel(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Delete a channel
     */
    public function deleteChannel(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Patch a channel
     */
    public function patchChannel(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Update channel's privacy
     */
    public function updateChannelPrivacy(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/privacy';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Restore a channel
     */
    public function restoreChannel(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/restore';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Move a channel
     */
    public function moveChannel(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/move';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get channel statistics
     */
    public function getChannelStats(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/stats';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get a channel's pinned posts
     */
    public function getPinnedPosts(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/pinned';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get public channels
     */
    public function getPublicChannelsForTeam(
        /** Team GUID */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of public channels per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/channels';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get private channels
     */
    public function getPrivateChannelsForTeam(
        /** Team GUID */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of private channels per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/channels/private';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get deleted channels
     */
    public function getDeletedChannelsForTeam(
        /** Team GUID */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of public channels per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/channels/deleted';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Autocomplete channels
     */
    public function autocompleteChannelsForTeam(
        /** Team GUID */
        string $team_id,
        /** Name or display name */
        string $name,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/channels/autocomplete';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['name'] = $name;
        return [];
    }

    /**
     * Autocomplete channels for search
     */
    public function autocompleteChannelsForTeamForSearch(
        /** Team GUID */
        string $team_id,
        /** Name or display name */
        string $name,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/channels/search_autocomplete';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['name'] = $name;
        return [];
    }

    /**
     * Search channels
     */
    public function searchChannels(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/channels/search';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Search archived channels
     */
    public function searchArchivedChannels(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/channels/search_archived';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Get a channel by name
     */
    public function getChannelByName(
        /** Team GUID */
        string $team_id,
        /** Channel Name */
        string $channel_name,
        /** Defines if deleted channels should be returned or not (Mattermost Server 5.26.0+) */
        ?bool $include_deleted = false,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/channels/name/{channel_name}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['channel_name'] = $channel_name;
        $queryParameters['include_deleted'] = $include_deleted;
        return [];
    }

    /**
     * Get a channel by name and team name
     */
    public function getChannelByNameForTeamName(
        /** Team Name */
        string $team_name,
        /** Channel Name */
        string $channel_name,
        /** Defines if deleted channels should be returned or not (Mattermost Server 5.26.0+) */
        ?bool $include_deleted = false,
    ): array
    {
        $path = '/api/v4/teams/name/{team_name}/channels/name/{channel_name}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_name'] = $team_name;
        $pathParameters['channel_name'] = $channel_name;
        $queryParameters['include_deleted'] = $include_deleted;
        return [];
    }

    /**
     * Get channel members
     */
    public function getChannelMembers(
        /** Channel GUID */
        string $channel_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of members per page. There is a maximum limit of 200 members. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Add user to channel
     */
    public function addChannelMember(
        /** The channel ID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get channel members by ids
     */
    public function getChannelMembersByIds(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/members/ids';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get channel member
     */
    public function getChannelMember(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Remove user from channel
     */
    public function removeUserFromChannel(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update channel roles
     */
    public function updateChannelRoles(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}/roles';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update the scheme-derived roles of a channel member.
     */
    public function updateChannelMemberSchemeRoles(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}/schemeRoles';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update channel notifications
     */
    public function updateChannelNotifyProps(
        /** Channel GUID */
        string $channel_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/members/{user_id}/notify_props';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * View channel
     */
    public function viewChannel(
        /** User ID to perform the view action for */
        string $user_id,
    ): array
    {
        $path = '/api/v4/channels/members/{user_id}/view';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get channel memberships and roles for a user
     */
    public function getChannelMembersForUser(
        /** User GUID */
        string $user_id,
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Get channels for user
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
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $queryParameters['include_deleted'] = $include_deleted;
        $queryParameters['last_delete_at'] = $last_delete_at;
        return [];
    }

    /**
     * Get all channels from all teams
     */
    public function getChannelsForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** Filters the deleted channels by this time in epoch format. Does not have any effect if include_deleted is set to false. */
        ?int $last_delete_at = 0,
        /** Defines if deleted channels should be returned or not */
        ?bool $include_deleted = false,
    ): array
    {
        $path = '/api/v4/users/{user_id}/channels';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $queryParameters['last_delete_at'] = $last_delete_at;
        $queryParameters['include_deleted'] = $include_deleted;
        return [];
    }

    /**
     * Get unread messages
     */
    public function getChannelUnread(
        /** User GUID */
        string $user_id,
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/channels/{channel_id}/unread';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Set a channel's scheme
     */
    public function updateChannelScheme(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/scheme';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Channel members minus group members.
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
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/members_minus_group_members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['group_ids'] = $group_ids;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Channel members counts for each group that has atleast one member in the channel
     */
    public function getChannelMemberCountsByGroup(
        /** Channel GUID */
        string $channel_id,
        /** Defines if member timezone counts should be returned or not */
        ?bool $include_timezones = false,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/member_counts_by_group';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['include_timezones'] = $include_timezones;
        return [];
    }

    /**
     * Get information about channel's moderation.
     */
    public function getChannelModerations(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/moderations';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Update a channel's moderation settings.
     */
    public function patchChannelModerations(
        /** Channel GUID */
        string $channel_id,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/moderations/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get user's sidebar categories
     */
    public function getSidebarCategoriesForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Create user's sidebar category
     */
    public function createSidebarCategoryForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update user's sidebar categories
     */
    public function updateSidebarCategoriesForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get user's sidebar category order
     */
    public function getSidebarCategoryOrderForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/order';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update user's sidebar category order
     */
    public function updateSidebarCategoryOrderForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/order';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get sidebar category
     */
    public function getSidebarCategoryForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
        /** Category GUID */
        string $category_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/{category_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        $pathParameters['category_id'] = $category_id;
        return [];
    }

    /**
     * Update sidebar category
     */
    public function updateSidebarCategoryForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
        /** Category GUID */
        string $category_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/{category_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        $pathParameters['category_id'] = $category_id;
        return [];
    }

    /**
     * Delete sidebar category
     */
    public function removeSidebarCategoryForTeamForUser(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
        /** Category GUID */
        string $category_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/channels/categories/{category_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        $pathParameters['category_id'] = $category_id;
        return [];
    }
}
;