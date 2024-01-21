<?php

namespace CedricZiel\MattermostPhp\Client;

class TeamsEndpoint
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
     * Create a team
     */
    public function createTeam(): array
    {
        $path = '/api/v4/teams';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get teams
     */
    public function getAllTeams(
        /** The page to select. */
        ?int $page = 0,
        /** The number of teams per page. */
        ?int $per_page = 60,
        /** Appends a total count of returned teams inside the response object - ex: `{ "teams": [], "total_count" : 0 }`. */
        ?bool $include_total_count = false,
        /**
         * If set to true, teams which are part of a data retention policy will be excluded. The `sysconsole_read_compliance` permission is required to use this parameter.
         * __Minimum server version__: 5.35
         */
        ?bool $exclude_policy_constrained = false,
    ): array
    {
        $path = '/api/v4/teams';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['include_total_count'] = $include_total_count;
        $queryParameters['exclude_policy_constrained'] = $exclude_policy_constrained;
        return [];
    }

    /**
     * Get a team
     */
    public function getTeam(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Update a team
     */
    public function updateTeam(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Delete a team
     */
    public function softDeleteTeam(
        /** Team GUID */
        string $team_id,
        /** Permanently delete the team, to be used for compliance reasons only. As of server version 5.0, `ServiceSettings.EnableAPITeamDeletion` must be set to `true` in the server's configuration. */
        ?bool $permanent = false,
    ): array
    {
        $path = '/api/v4/teams/{team_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['permanent'] = $permanent;
        return [];
    }

    /**
     * Patch a team
     */
    public function patchTeam(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Update teams's privacy
     */
    public function updateTeamPrivacy(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/privacy';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Restore a team
     */
    public function restoreTeam(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/restore';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Get a team by name
     */
    public function getTeamByName(
        /** Team Name */
        string $name,
    ): array
    {
        $path = '/api/v4/teams/name/{name}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['name'] = $name;
        return [];
    }

    /**
     * Search teams
     */
    public function searchTeams(): array
    {
        $path = '/api/v4/teams/search';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Check if team exists
     */
    public function teamExists(
        /** Team Name */
        string $name,
    ): array
    {
        $path = '/api/v4/teams/name/{name}/exists';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['name'] = $name;
        return [];
    }

    /**
     * Get a user's teams
     */
    public function getTeamsForUser(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get team members
     */
    public function getTeamMembers(
        /** Team GUID */
        string $team_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of users per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Add user to team
     */
    public function addTeamMember(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Add user to team from invite
     */
    public function addTeamMemberFromInvite(
        /** Token id from the invitation */
        string $token,
    ): array
    {
        $path = '/api/v4/teams/members/invite';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['token'] = $token;
        return [];
    }

    /**
     * Add multiple users to team
     */
    public function addTeamMembers(
        /** Team GUID */
        string $team_id,
        /** Instead of aborting the operation if a user cannot be added, return an arrray that will contain both the success and added members and the ones with error, in form of `[{"member": {...}, "user_id", "...", "error": {...}}]` */
        ?bool $graceful,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/members/batch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['graceful'] = $graceful;
        return [];
    }

    /**
     * Get team members for a user
     */
    public function getTeamMembersForUser(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get a team member
     */
    public function getTeamMember(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/members/{user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Remove user from team
     */
    public function removeTeamMember(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/members/{user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get team members by ids
     */
    public function getTeamMembersByIds(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/members/ids';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Get a team stats
     */
    public function getTeamStats(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/stats';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Regenerate the Invite ID from a Team
     */
    public function regenerateTeamInviteId(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/regenerate_invite_id';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Get the team icon
     */
    public function getTeamIcon(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/image';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Sets the team icon
     */
    public function setTeamIcon(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/image';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Remove the team icon
     */
    public function removeTeamIcon(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/image';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Update a team member roles
     */
    public function updateTeamMemberRoles(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/members/{user_id}/roles';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update the scheme-derived roles of a team member.
     */
    public function updateTeamMemberSchemeRoles(
        /** Team GUID */
        string $team_id,
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/members/{user_id}/schemeRoles';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get team unreads for a user
     */
    public function getTeamsUnreadForUser(
        /** User GUID */
        string $user_id,
        /** Optional team id to be excluded from the results */
        string $exclude_team,
        /** Boolean to determine whether the collapsed threads should be included or not */
        ?bool $include_collapsed_threads = false,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/unread';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $queryParameters['exclude_team'] = $exclude_team;
        $queryParameters['include_collapsed_threads'] = $include_collapsed_threads;
        return [];
    }

    /**
     * Get unreads for a team
     */
    public function getTeamUnread(
        /** User GUID */
        string $user_id,
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/unread';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Invite users to the team by email
     */
    public function inviteUsersToTeam(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/invite/email';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Invite guests to the team by email
     */
    public function inviteGuestsToTeam(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/invite-guests/email';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Invalidate active email invitations
     */
    public function invalidateEmailInvites(): array
    {
        $path = '/api/v4/teams/invites/email';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Import a Team from other application
     */
    public function importTeam(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/import';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Get invite info for a team
     */
    public function getTeamInviteInfo(
        /** Invite id for a team */
        string $invite_id,
    ): array
    {
        $path = '/api/v4/teams/invite/{invite_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['invite_id'] = $invite_id;
        return [];
    }

    /**
     * Set a team's scheme
     */
    public function updateTeamScheme(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/scheme';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Team members minus group members.
     */
    public function teamMembersMinusGroupMembers(
        /** Team GUID */
        string $team_id,
        /** A comma-separated list of group ids. */
        string $group_ids = '',
        /** The page to select. */
        ?int $page = 0,
        /** The number of users per page. */
        ?int $per_page = 0,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/members_minus_group_members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['group_ids'] = $group_ids;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Search files in a team
     */
    public function searchFiles(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/files/search';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }
}
;