<?php

namespace CedricZiel\MattermostPhp\Client;

class UsersEndpoint
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
     * Login to Mattermost server
     */
    public function login(): array
    {
        $path = '/api/v4/users/login';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Auto-Login to Mattermost server using CWS token
     */
    public function loginByCwsToken(): array
    {
        $path = '/api/v4/users/login/cws';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Logout from the Mattermost server
     */
    public function logout(): array
    {
        $path = '/api/v4/users/logout';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Create a user
     */
    public function createUser(
        /** Token id from an email invitation */
        ?string $t,
        /** Token id from an invitation link */
        ?string $iid,
    ): array
    {
        $path = '/api/v4/users';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['t'] = $t;
        $queryParameters['iid'] = $iid;
        return [];
    }

    /**
     * Get users
     */
    public function getUsers(
        /** The page to select. */
        ?int $page = 0,
        /** The number of users per page. There is a maximum limit of 200 users per page. */
        ?int $per_page = 60,
        /** The ID of the team to get users for. */
        ?string $in_team,
        /** The ID of the team to exclude users for. Must not be used with "in_team" query parameter. */
        ?string $not_in_team,
        /** The ID of the channel to get users for. */
        ?string $in_channel,
        /** The ID of the channel to exclude users for. Must be used with "in_channel" query parameter. */
        ?string $not_in_channel,
        /** The ID of the group to get users for. Must have `manage_system` permission. */
        ?string $in_group,
        /** When used with `not_in_channel` or `not_in_team`, returns only the users that are allowed to join the channel or team based on its group constrains. */
        ?bool $group_constrained,
        /** Whether or not to list users that are not on any team. This option takes precendence over `in_team`, `in_channel`, and `not_in_channel`. */
        ?bool $without_team,
        /** Whether or not to list only users that are active. This option cannot be used along with the `inactive` option. */
        ?bool $active,
        /** Whether or not to list only users that are deactivated. This option cannot be used along with the `active` option. */
        ?bool $inactive,
        /** Returns users that have this role. */
        ?string $role,
        /**
         * Sort is only available in conjunction with certain options below. The paging parameter is also always available.
         *
         * ##### `in_team`
         * Can be "", "last_activity_at" or "create_at".
         * When left blank, sorting is done by username.
         * __Minimum server version__: 4.0
         * ##### `in_channel`
         * Can be "", "status".
         * When left blank, sorting is done by username. `status` will sort by User's current status (Online, Away, DND, Offline), then by Username.
         * __Minimum server version__: 4.7
         * ##### `in_group`
         * Can be "", "display_name".
         * When left blank, sorting is done by username. `display_name` will sort alphabetically by user's display name.
         * __Minimum server version__: 7.7
         */
        ?string $sort,
        /**
         * Comma separated string used to filter users based on any of the specified system roles
         *
         * Example: `?roles=system_admin,system_user` will return users that are either system admins or system users
         *
         * __Minimum server version__: 5.26
         */
        ?string $roles,
        /**
         * Comma separated string used to filter users based on any of the specified channel roles, can only be used in conjunction with `in_channel`
         *
         * Example: `?in_channel=4eb6axxw7fg3je5iyasnfudc5y&channel_roles=channel_user` will return users that are only channel users and not admins or guests
         *
         * __Minimum server version__: 5.26
         */
        ?string $channel_roles,
        /**
         * Comma separated string used to filter users based on any of the specified team roles, can only be used in conjunction with `in_team`
         *
         * Example: `?in_team=4eb6axxw7fg3je5iyasnfudc5y&team_roles=team_user` will return users that are only team users and not admins or guests
         *
         * __Minimum server version__: 5.26
         */
        ?string $team_roles,
    ): array
    {
        $path = '/api/v4/users';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['in_team'] = $in_team;
        $queryParameters['not_in_team'] = $not_in_team;
        $queryParameters['in_channel'] = $in_channel;
        $queryParameters['not_in_channel'] = $not_in_channel;
        $queryParameters['in_group'] = $in_group;
        $queryParameters['group_constrained'] = $group_constrained;
        $queryParameters['without_team'] = $without_team;
        $queryParameters['active'] = $active;
        $queryParameters['inactive'] = $inactive;
        $queryParameters['role'] = $role;
        $queryParameters['sort'] = $sort;
        $queryParameters['roles'] = $roles;
        $queryParameters['channel_roles'] = $channel_roles;
        $queryParameters['team_roles'] = $team_roles;
        return [];
    }

    /**
     * Permanent delete all users
     */
    public function permanentDeleteAllUsers(): array
    {
        $path = '/api/v4/users';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get users by ids
     */
    public function getUsersByIds(
        /**
         * Only return users that have been modified since the given Unix timestamp (in milliseconds).
         *
         * __Minimum server version__: 5.14
         */
        ?int $since,
    ): array
    {
        $path = '/api/v4/users/ids';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['since'] = $since;
        return [];
    }

    /**
     * Get users by group channels ids
     */
    public function getUsersByGroupChannelIds(): array
    {
        $path = '/api/v4/users/group_channels';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get users by usernames
     */
    public function getUsersByUsernames(): array
    {
        $path = '/api/v4/users/usernames';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Search users
     */
    public function searchUsers(): array
    {
        $path = '/api/v4/users/search';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Autocomplete users
     */
    public function autocompleteUsers(
        /** Team ID */
        ?string $team_id,
        /** Channel ID */
        ?string $channel_id,
        /** Username, nickname first name or last name */
        string $name,
        /**
         * The maximum number of users to return in each subresult
         *
         * __Available as of server version 5.6. Defaults to `100` if not provided or on an earlier server version.__
         */
        ?int $limit = 100,
    ): array
    {
        $path = '/api/v4/users/autocomplete';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['team_id'] = $team_id;
        $queryParameters['channel_id'] = $channel_id;
        $queryParameters['name'] = $name;
        $queryParameters['limit'] = $limit;
        return [];
    }

    /**
     * Get user IDs of known users
     */
    public function getKnownUsers(): array
    {
        $path = '/api/v4/users/known';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get total count of users in the system
     */
    public function getTotalUsersStats(): array
    {
        $path = '/api/v4/users/stats';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get total count of users in the system matching the specified filters
     */
    public function getTotalUsersStatsFiltered(
        /** The ID of the team to get user stats for. */
        ?string $in_team,
        /** The ID of the channel to get user stats for. */
        ?string $in_channel,
        /** If deleted accounts should be included in the count. */
        ?bool $include_deleted,
        /** If bot accounts should be included in the count. */
        ?bool $include_bots,
        /**
         * Comma separated string used to filter users based on any of the specified system roles
         *
         * Example: `?roles=system_admin,system_user` will include users that are either system admins or system users
         */
        ?string $roles,
        /**
         * Comma separated string used to filter users based on any of the specified channel roles, can only be used in conjunction with `in_channel`
         *
         * Example: `?in_channel=4eb6axxw7fg3je5iyasnfudc5y&channel_roles=channel_user` will include users that are only channel users and not admins or guests
         */
        ?string $channel_roles,
        /**
         * Comma separated string used to filter users based on any of the specified team roles, can only be used in conjunction with `in_team`
         *
         * Example: `?in_team=4eb6axxw7fg3je5iyasnfudc5y&team_roles=team_user` will include users that are only team users and not admins or guests
         */
        ?string $team_roles,
    ): array
    {
        $path = '/api/v4/users/stats/filtered';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['in_team'] = $in_team;
        $queryParameters['in_channel'] = $in_channel;
        $queryParameters['include_deleted'] = $include_deleted;
        $queryParameters['include_bots'] = $include_bots;
        $queryParameters['roles'] = $roles;
        $queryParameters['channel_roles'] = $channel_roles;
        $queryParameters['team_roles'] = $team_roles;
        return [];
    }

    /**
     * Get a user
     */
    public function getUser(
        /** User GUID. This can also be "me" which will point to the current user. */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update a user
     */
    public function updateUser(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Deactivate a user account.
     */
    public function deleteUser(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Patch a user
     */
    public function patchUser(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update a user's roles
     */
    public function updateUserRoles(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/roles';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update user active status
     */
    public function updateUserActive(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/active';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get user's profile image
     */
    public function getProfileImage(
        /** User GUID */
        string $user_id,
        /** Not used by the server. Clients can pass in the last picture update time of the user to potentially take advantage of caching */
        ?\number $_,
    ): array
    {
        $path = '/api/v4/users/{user_id}/image';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $queryParameters['_'] = $_;
        return [];
    }

    /**
     * Set user's profile image
     */
    public function setProfileImage(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/image';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Delete user's profile image
     */
    public function setDefaultProfileImage(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/image';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Return user's default (generated) profile image
     */
    public function getDefaultProfileImage(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/image/default';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get a user by username
     */
    public function getUserByUsername(
        /** Username */
        string $username,
    ): array
    {
        $path = '/api/v4/users/username/{username}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['username'] = $username;
        return [];
    }

    /**
     * Reset password
     */
    public function resetPassword(): array
    {
        $path = '/api/v4/users/password/reset';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Update a user's MFA
     */
    public function updateUserMfa(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/mfa';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Generate MFA secret
     */
    public function generateMfaSecret(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/mfa/generate';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Demote a user to a guest
     */
    public function demoteUserToGuest(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/demote';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Promote a guest to user
     */
    public function promoteGuestToUser(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/promote';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Check MFA
     */
    public function checkUserMfa(): array
    {
        $path = '/api/v4/users/mfa';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Update a user's password
     */
    public function updateUserPassword(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/password';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Send password reset email
     */
    public function sendPasswordResetEmail(): array
    {
        $path = '/api/v4/users/password/reset/send';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a user by email
     */
    public function getUserByEmail(
        /** User Email */
        string $email,
    ): array
    {
        $path = '/api/v4/users/email/{email}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['email'] = $email;
        return [];
    }

    /**
     * Get user's sessions
     */
    public function getSessions(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/sessions';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Revoke a user session
     */
    public function revokeSession(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/sessions/revoke';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Revoke all active sessions for a user
     */
    public function revokeAllSessions(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/sessions/revoke/all';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Attach mobile device
     */
    public function attachDeviceId(): array
    {
        $path = '/api/v4/users/sessions/device';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get user's audits
     */
    public function getUserAudits(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/audits';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Verify user email by ID
     */
    public function verifyUserEmailWithoutToken(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/email/verify/member';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Verify user email
     */
    public function verifyUserEmail(): array
    {
        $path = '/api/v4/users/email/verify';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Send verification email
     */
    public function sendVerificationEmail(): array
    {
        $path = '/api/v4/users/email/verify/send';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Switch login method
     */
    public function switchAccountType(): array
    {
        $path = '/api/v4/users/login/switch';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Create a user access token
     */
    public function createUserAccessToken(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/tokens';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get user access tokens
     */
    public function getUserAccessTokensForUser(
        /** User GUID */
        string $user_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of tokens per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/users/{user_id}/tokens';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get user access tokens
     */
    public function getUserAccessTokens(
        /** The page to select. */
        ?int $page = 0,
        /** The number of tokens per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/users/tokens';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Revoke a user access token
     */
    public function revokeUserAccessToken(): array
    {
        $path = '/api/v4/users/tokens/revoke';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a user access token
     */
    public function getUserAccessToken(
        /** User access token GUID */
        string $token_id,
    ): array
    {
        $path = '/api/v4/users/tokens/{token_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['token_id'] = $token_id;
        return [];
    }

    /**
     * Disable personal access token
     */
    public function disableUserAccessToken(): array
    {
        $path = '/api/v4/users/tokens/disable';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Enable personal access token
     */
    public function enableUserAccessToken(): array
    {
        $path = '/api/v4/users/tokens/enable';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Search tokens
     */
    public function searchUserAccessTokens(): array
    {
        $path = '/api/v4/users/tokens/search';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Update a user's authentication method
     */
    public function updateUserAuth(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/auth';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Records user action when they accept or decline custom terms of service
     */
    public function registerTermsOfServiceAction(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/terms_of_service';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Fetches user's latest terms of service action if the latest action was for acceptance.
     */
    public function getUserTermsOfService(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/terms_of_service';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Revoke all sessions from all users.
     */
    public function revokeSessionsFromAllUsers(): array
    {
        $path = '/api/v4/users/sessions/revoke/all';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Publish a user typing websocket event.
     */
    public function publishUserTyping(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/typing';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get uploads for a user
     */
    public function getUploadsForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/uploads';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get all channel members from all teams for a user
     */
    public function getChannelMembersWithTeamDataForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** Page specifies which part of the results to return, by PageSize. */
        ?int $page,
        /** PageSize specifies the size of the returned chunk of results. */
        ?int $pageSize,
    ): array
    {
        $path = '/api/v4/users/{user_id}/channel_members';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['pageSize'] = $pageSize;
        return [];
    }

    /**
     * Migrate user accounts authentication type to LDAP.
     */
    public function migrateAuthToLdap(): array
    {
        $path = '/api/v4/users/migrate_auth/ldap';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Migrate user accounts authentication type to SAML.
     */
    public function migrateAuthToSaml(): array
    {
        $path = '/api/v4/users/migrate_auth/saml';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get users with invalid emails
     */
    public function getUsersWithInvalidEmails(
        /** The page to select. */
        ?int $page = 0,
        /** The number of users per page. There is a maximum limit of 200 users per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/users/invalid_emails';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get a list of paged and sorted users for admin reporting purposes
     */
    public function getUsersForReporting(
        /** The column to sort the users by. Must be one of ("CreateAt", "Username", "FirstName", "LastName", "Nickname", "Email") or the API will return an error. */
        ?string $sort_column = 'Username',
        /** The direction in which to accept paging values from. Will return values ahead of the cursor if "up", and below the cursor if "down". Default is "down". */
        ?string $direction = 'down',
        /** The sorting direction. Must be one of ("asc", "desc"). Will default to 'asc' if not specified or the input is invalid. */
        ?string $sort_direction = 'asc',
        /** The maximum number of users to return. */
        ?int $page_size = 50,
        /** The value of the sorted column corresponding to the cursor to read from. Should be blank for the first page asked for. */
        ?string $from_column_value,
        /** The value of the user id corresponding to the cursor to read from. Should be blank for the first page asked for. */
        ?string $from_id,
        /** The date range of the post statistics to display. Must be one of ("last30days", "previousmonth", "last6months", "alltime"). Will default to 'alltime' if the input is not valid. */
        ?string $date_range = 'alltime',
        /** Filter users by their role. */
        ?string $role_filter,
        /** Filter users by a specified team ID. */
        ?string $team_filter,
        /** If true, show only users that have no team. Will ignore provided "team_filter" if true. */
        ?bool $has_no_team,
        /** If true, show only users that are inactive. Cannot be used at the same time as "hide_inactive" */
        ?bool $hide_active,
        /** If true, show only users that are active. Cannot be used at the same time as "hide_active" */
        ?bool $hide_inactive,
    ): array
    {
        $path = '/api/v4/reports/users';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['sort_column'] = $sort_column;
        $queryParameters['direction'] = $direction;
        $queryParameters['sort_direction'] = $sort_direction;
        $queryParameters['page_size'] = $page_size;
        $queryParameters['from_column_value'] = $from_column_value;
        $queryParameters['from_id'] = $from_id;
        $queryParameters['date_range'] = $date_range;
        $queryParameters['role_filter'] = $role_filter;
        $queryParameters['team_filter'] = $team_filter;
        $queryParameters['has_no_team'] = $has_no_team;
        $queryParameters['hide_active'] = $hide_active;
        $queryParameters['hide_inactive'] = $hide_inactive;
        return [];
    }

    /**
     * Gets the user limits for the server
     */
    public function getUserLimits(): array
    {
        $path = '/api/v4/limits/users';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;