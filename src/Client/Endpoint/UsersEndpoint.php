<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class UsersEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        protected string $token,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
    ) {
        $this->httpClient = $httpClient ?? \Http\Discovery\Psr18ClientDiscovery::find();
        $this->requestFactory = $httpClient ?? \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
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
     * Login to Mattermost server
     * ##### Permissions
     * No permission required
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function login(
        \CedricZiel\MattermostPhp\Client\Model\LoginRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\User|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/login';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\User::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Auto-Login to Mattermost server using CWS token
     * CWS stands for Customer Web Server which is the cloud service used to manage cloud instances.
     * ##### Permissions
     * A Cloud license is required
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function loginByCwsToken(
        \CedricZiel\MattermostPhp\Client\Model\LoginByCwsTokenRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/login/cws';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Logout from the Mattermost server
     * ##### Permissions
     * An active session is required
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function logout(
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/logout';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a user
     * Create a new user on the system. Password is required for email login. For other authentication types such as LDAP or SAML, auth_data and auth_service fields are required.
     * ##### Permissions
     * No permission required for creating email/username accounts on an open server. Auth Token is required for other authentication types such as LDAP or SAML.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createUser(
        /** Token id from an email invitation */
        ?string $t = null,
        /** Token id from an invitation link */
        ?string $iid = null,
        \CedricZiel\MattermostPhp\Client\Model\CreateUserRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\User|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['t'] = $t;
        $queryParameters['iid'] = $iid;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\User::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get users
     * Get a page of a list of users. Based on query string parameters, select users from a team, channel, or select users not in a specific channel.
     *
     * Since server version 4.0, some basic sorting is available using the `sort` query parameter. Sorting is currently only supported when selecting users on a team.
     * ##### Permissions
     * Requires an active session and (if specified) membership to the channel or team being selected from.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUsers(
        /** The page to select. */
        ?int $page = 0,
        /** The number of users per page. There is a maximum limit of 200 users per page. */
        ?int $per_page = 60,
        /** The ID of the team to get users for. */
        ?string $in_team = null,
        /** The ID of the team to exclude users for. Must not be used with "in_team" query parameter. */
        ?string $not_in_team = null,
        /** The ID of the channel to get users for. */
        ?string $in_channel = null,
        /** The ID of the channel to exclude users for. Must be used with "in_channel" query parameter. */
        ?string $not_in_channel = null,
        /** The ID of the group to get users for. Must have `manage_system` permission. */
        ?string $in_group = null,
        /** When used with `not_in_channel` or `not_in_team`, returns only the users that are allowed to join the channel or team based on its group constrains. */
        ?bool $group_constrained = null,
        /** Whether or not to list users that are not on any team. This option takes precendence over `in_team`, `in_channel`, and `not_in_channel`. */
        ?bool $without_team = null,
        /** Whether or not to list only users that are active. This option cannot be used along with the `inactive` option. */
        ?bool $active = null,
        /** Whether or not to list only users that are deactivated. This option cannot be used along with the `active` option. */
        ?bool $inactive = null,
        /** Returns users that have this role. */
        ?string $role = null,
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
        ?string $sort = null,
        /**
         * Comma separated string used to filter users based on any of the specified system roles
         *
         * Example: `?roles=system_admin,system_user` will return users that are either system admins or system users
         *
         * __Minimum server version__: 5.26
         */
        ?string $roles = null,
        /**
         * Comma separated string used to filter users based on any of the specified channel roles, can only be used in conjunction with `in_channel`
         *
         * Example: `?in_channel=4eb6axxw7fg3je5iyasnfudc5y&channel_roles=channel_user` will return users that are only channel users and not admins or guests
         *
         * __Minimum server version__: 5.26
         */
        ?string $channel_roles = null,
        /**
         * Comma separated string used to filter users based on any of the specified team roles, can only be used in conjunction with `in_team`
         *
         * Example: `?in_team=4eb6axxw7fg3je5iyasnfudc5y&team_roles=team_user` will return users that are only team users and not admins or guests
         *
         * __Minimum server version__: 5.26
         */
        ?string $team_roles = null,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUsersResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users';
        $method = 'get';
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

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUsersResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Permanent delete all users
     * Permanently deletes all users and all their related information, including posts.
     *
     * __Minimum server version__: 5.26.0
     *
     * __Local mode only__: This endpoint is only available through [local mode](https://docs.mattermost.com/administration/mmctl-cli-tool.html#local-mode).
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function permanentDeleteAllUsers()
    {
        $path = '/api/v4/users';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];

        return $this->mapResponse($response, $map);
    }

    /**
     * Get users by ids
     * Get a list of users based on a provided list of user ids.
     * ##### Permissions
     * Requires an active session but no other permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUsersByIds(
        /**
         * Only return users that have been modified since the given Unix timestamp (in milliseconds).
         *
         * __Minimum server version__: 5.14
         */
        ?int $since = null,
        \CedricZiel\MattermostPhp\Client\Model\GetUsersByIdsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUsersByIdsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/ids';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['since'] = $since;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUsersByIdsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get users by group channels ids
     * Get an object containing a key per group channel id in the
     * query and its value as a list of users members of that group
     * channel.
     *
     * The user must be a member of the group ids in the query, or
     * they will be omitted from the response.
     * ##### Permissions
     * Requires an active session but no other permissions.
     *
     * __Minimum server version__: 5.14
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUsersByGroupChannelIds(
        \CedricZiel\MattermostPhp\Client\Model\GetUsersByGroupChannelIdsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUsersByGroupChannelIdsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/group_channels';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUsersByGroupChannelIdsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get users by usernames
     * Get a list of users based on a provided list of usernames.
     * ##### Permissions
     * Requires an active session but no other permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUsersByUsernames(
        \CedricZiel\MattermostPhp\Client\Model\GetUsersByUsernamesRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUsersByUsernamesResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/usernames';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUsersByUsernamesResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search users
     * Get a list of users based on search criteria provided in the request body. Searches are typically done against username, full name, nickname and email unless otherwise configured by the server.
     * ##### Permissions
     * Requires an active session and `read_channel` and/or `view_team` permissions for any channels or teams specified in the request body.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchUsers(
        \CedricZiel\MattermostPhp\Client\Model\SearchUsersRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SearchUsersResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/search';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SearchUsersResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Autocomplete users
     * Get a list of users for the purpose of autocompleting based on the provided search term. Specify a combination of `team_id` and `channel_id` to filter results further.
     * ##### Permissions
     * Requires an active session and `view_team` and `read_channel` on any teams or channels used to filter the results further.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function autocompleteUsers(
        /** Team ID */
        ?string $team_id = null,
        /** Channel ID */
        ?string $channel_id = null,
        /** Username, nickname first name or last name */
        string $name,
        /**
         * The maximum number of users to return in each subresult
         *
         * __Available as of server version 5.6. Defaults to `100` if not provided or on an earlier server version.__
         */
        ?int $limit = 100,
    ): \CedricZiel\MattermostPhp\Client\Model\UserAutocomplete|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/autocomplete';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['team_id'] = $team_id;
        $queryParameters['channel_id'] = $channel_id;
        $queryParameters['name'] = $name;
        $queryParameters['limit'] = $limit;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UserAutocomplete::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get user IDs of known users
     * Get the list of user IDs of users with any direct relationship with a
     * user. That means any user sharing any channel, including direct and
     * group channels.
     * ##### Permissions
     * Must be authenticated.
     *
     * __Minimum server version__: 5.23
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getKnownUsers(
    ): \CedricZiel\MattermostPhp\Client\Model\KnownUsers|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/known';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\KnownUsers::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get total count of users in the system
     * Get a total count of users in the system.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getTotalUsersStats(
    ): \CedricZiel\MattermostPhp\Client\Model\UsersStats|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/stats';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UsersStats::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get total count of users in the system matching the specified filters
     * Get a count of users in the system matching the specified filters.
     *
     * __Minimum server version__: 5.26
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getTotalUsersStatsFiltered(
        /** The ID of the team to get user stats for. */
        ?string $in_team = null,
        /** The ID of the channel to get user stats for. */
        ?string $in_channel = null,
        /** If deleted accounts should be included in the count. */
        ?bool $include_deleted = null,
        /** If bot accounts should be included in the count. */
        ?bool $include_bots = null,
        /**
         * Comma separated string used to filter users based on any of the specified system roles
         *
         * Example: `?roles=system_admin,system_user` will include users that are either system admins or system users
         */
        ?string $roles = null,
        /**
         * Comma separated string used to filter users based on any of the specified channel roles, can only be used in conjunction with `in_channel`
         *
         * Example: `?in_channel=4eb6axxw7fg3je5iyasnfudc5y&channel_roles=channel_user` will include users that are only channel users and not admins or guests
         */
        ?string $channel_roles = null,
        /**
         * Comma separated string used to filter users based on any of the specified team roles, can only be used in conjunction with `in_team`
         *
         * Example: `?in_team=4eb6axxw7fg3je5iyasnfudc5y&team_roles=team_user` will include users that are only team users and not admins or guests
         */
        ?string $team_roles = null,
    ): \CedricZiel\MattermostPhp\Client\Model\UsersStats|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/stats/filtered';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['in_team'] = $in_team;
        $queryParameters['in_channel'] = $in_channel;
        $queryParameters['include_deleted'] = $include_deleted;
        $queryParameters['include_bots'] = $include_bots;
        $queryParameters['roles'] = $roles;
        $queryParameters['channel_roles'] = $channel_roles;
        $queryParameters['team_roles'] = $team_roles;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UsersStats::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a user
     * Get a user a object. Sensitive information will be sanitized out.
     * ##### Permissions
     * Requires an active session but no other permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUser(
        /** User GUID. This can also be "me" which will point to the current user. */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\User|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\User::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a user
     * Update a user by providing the user object. The fields that can be updated are defined in the request body, all other provided fields will be ignored. Any fields not included in the request body will be set to null or reverted to default values.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateUser(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateUserRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\User|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\User::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Deactivate a user account.
     * Deactivates the user and revokes all its sessions by archiving its user object.
     *
     * As of server version 5.28, optionally use the `permanent=true` query parameter to permanently delete the user for compliance reasons. To use this feature `ServiceSettings.EnableAPIUserDeletion` must be set to `true` in the server's configuration.
     * ##### Permissions
     * Must be logged in as the user being deactivated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteUser(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

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
     * Patch a user
     * Partially update a user by providing only the fields you want to update. Omitted fields will not be updated. The fields that can be updated are defined in the request body, all other provided fields will be ignored.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchUser(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchUserRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\User|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\User::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a user's roles
     * Update a user's system-level roles. Valid user roles are "system_user", "system_admin" or both of them. Overwrites any previously assigned system-level roles.
     * ##### Permissions
     * Must have the `manage_roles` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateUserRoles(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateUserRolesRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/roles';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Update user active status
     * Update user active or inactive status.
     *
     * __Since server version 4.6, users using a SSO provider to login can be activated or deactivated with this endpoint. However, if their activation status in Mattermost does not reflect their status in the SSO provider, the next synchronization or login by that user will reset the activation status to that of their account in the SSO provider. Server versions 4.5 and before do not allow activation or deactivation of SSO users from this endpoint.__
     * ##### Permissions
     * User can deactivate themselves.
     * User with `manage_system` permission can activate or deactivate a user.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateUserActive(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateUserActiveRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/active';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Get user's profile image
     * Get a user's profile image based on user_id string parameter.
     * ##### Permissions
     * Must be logged in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getProfileImage(
        /** User GUID */
        string $user_id,
        /** Not used by the server. Clients can pass in the last picture update time of the user to potentially take advantage of caching */
        ?\number $_ = null,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/{user_id}/image';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $queryParameters['_'] = $_;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Set user's profile image
     * Set a user's profile image based on user_id string parameter.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function setProfileImage(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/{user_id}/image';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete user's profile image
     * Delete user's profile image and reset to default image based on user_id string parameter.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     * __Minimum server version__: 5.5
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function setDefaultProfileImage(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/{user_id}/image';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Return user's default (generated) profile image
     * Returns the default (generated) user profile image based on user_id string parameter.
     * ##### Permissions
     * Must be logged in.
     * __Minimum server version__: 5.5
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getDefaultProfileImage(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/{user_id}/image/default';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a user by username
     * Get a user object by providing a username. Sensitive information will be sanitized out.
     * ##### Permissions
     * Requires an active session but no other permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserByUsername(
        /** Username */
        string $username,
    ): \CedricZiel\MattermostPhp\Client\Model\User|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/username/{username}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['username'] = $username;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\User::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Reset password
     * Update the password for a user using a one-use, timed recovery code tied to the user's account. Only works for non-SSO users.
     * ##### Permissions
     * No permissions required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function resetPassword(
        \CedricZiel\MattermostPhp\Client\Model\ResetPasswordRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/password/reset';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Update a user's MFA
     * Activates multi-factor authentication for the user if `activate` is true and a valid `code` is provided. If activate is false, then `code` is not required and multi-factor authentication is disabled for the user.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateUserMfa(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateUserMfaRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/{user_id}/mfa';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Generate MFA secret
     * Generates an multi-factor authentication secret for a user and returns it as a string and as base64 encoded QR code image.
     * ##### Permissions
     * Must be logged in as the user or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function generateMfaSecret(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GenerateMfaSecretResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/{user_id}/mfa/generate';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GenerateMfaSecretResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Demote a user to a guest
     * Convert a regular user into a guest. This will convert the user into a
     * guest for the whole system while retaining their existing team and
     * channel memberships.
     *
     * __Minimum server version__: 5.16
     *
     * ##### Permissions
     * Must be logged in as the user or have the `demote_to_guest` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function demoteUserToGuest(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/{user_id}/demote';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Promote a guest to user
     * Convert a guest into a regular user. This will convert the guest into a
     * user for the whole system while retaining any team and channel
     * memberships and automatically joining them to the default channels.
     *
     * __Minimum server version__: 5.16
     *
     * ##### Permissions
     * Must be logged in as the user or have the `promote_guest` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function promoteGuestToUser(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/{user_id}/promote';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Check MFA
     * Check if a user has multi-factor authentication active on their account by providing a login id. Used to check whether an MFA code needs to be provided when logging in.
     * ##### Permissions
     * No permission required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function checkUserMfa(
        \CedricZiel\MattermostPhp\Client\Model\CheckUserMfaRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\CheckUserMfaResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse
    {
        $path = '/api/v4/users/mfa';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\CheckUserMfaResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a user's password
     * Update a user's password. New password must meet password policy set by server configuration. Current password is required if you're updating your own password.
     * ##### Permissions
     * Must be logged in as the user the password is being changed for or have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateUserPassword(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateUserPasswordRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/password';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Send password reset email
     * Send an email containing a link for resetting the user's password. The link will contain a one-use, timed recovery code tied to the user's account. Only works for non-SSO users.
     * ##### Permissions
     * No permissions required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function sendPasswordResetEmail(
        \CedricZiel\MattermostPhp\Client\Model\SendPasswordResetEmailRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/password/reset/send';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Get a user by email
     * Get a user object by providing a user email. Sensitive information will be sanitized out.
     * ##### Permissions
     * Requires an active session and for the current session to be able to view another user's email based on the server's privacy settings.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserByEmail(
        /** User Email */
        string $email,
    ): \CedricZiel\MattermostPhp\Client\Model\User|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/email/{email}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['email'] = $email;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\User::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get user's sessions
     * Get a list of sessions by providing the user GUID. Sensitive information will be sanitized out.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSessions(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetSessionsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/sessions';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetSessionsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Revoke a user session
     * Revokes a user session from the provided user id and session id strings.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function revokeSession(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\RevokeSessionRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/sessions/revoke';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Revoke all active sessions for a user
     * Revokes all user sessions from the provided user id and session id strings.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     * __Minimum server version__: 4.4
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function revokeAllSessions(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/sessions/revoke/all';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Attach mobile device
     * Attach a mobile device id to the currently logged in session. This will enable push notifications for a user, if configured by the server.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function attachDeviceId(
        \CedricZiel\MattermostPhp\Client\Model\AttachDeviceIdRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/sessions/device';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get user's audits
     * Get a list of audit by providing the user GUID.
     * ##### Permissions
     * Must be logged in as the user or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserAudits(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUserAuditsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/audits';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUserAuditsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Verify user email by ID
     * Verify the email used by a user without a token.
     *
     * __Minimum server version__: 5.24
     *
     * ##### Permissions
     *
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function verifyUserEmailWithoutToken(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\User|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/email/verify/member';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\User::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Verify user email
     * Verify the email used by a user to sign-up their account with.
     * ##### Permissions
     * No permissions required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function verifyUserEmail(
        \CedricZiel\MattermostPhp\Client\Model\VerifyUserEmailRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse
    {
        $path = '/api/v4/users/email/verify';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Send verification email
     * Send an email with a verification link to a user that has an email matching the one in the request body. This endpoint will return success even if the email does not match any users on the system.
     * ##### Permissions
     * No permissions required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function sendVerificationEmail(
        \CedricZiel\MattermostPhp\Client\Model\SendVerificationEmailRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse
    {
        $path = '/api/v4/users/email/verify/send';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Switch login method
     * Switch a user's login method from using email to OAuth2/SAML/LDAP or back to email. When switching to OAuth2/SAML, account switching is not complete until the user follows the returned link and completes any steps on the OAuth2/SAML service provider.
     *
     * To switch from email to OAuth2/SAML, specify `current_service`, `new_service`, `email` and `password`.
     *
     * To switch from OAuth2/SAML to email, specify `current_service`, `new_service`, `email` and `new_password`.
     *
     * To switch from email to LDAP/AD, specify `current_service`, `new_service`, `email`, `password`, `ldap_ip` and `new_password` (this is the user's LDAP password).
     *
     * To switch from LDAP/AD to email, specify `current_service`, `new_service`, `ldap_ip`, `password` (this is the user's LDAP password), `email`  and `new_password`.
     *
     * Additionally, specify `mfa_code` when trying to switch an account on LDAP/AD or email that has MFA activated.
     *
     * ##### Permissions
     * No current authentication required except when switching from OAuth2/SAML to email.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function switchAccountType(
        \CedricZiel\MattermostPhp\Client\Model\SwitchAccountTypeRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SwitchAccountTypeResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/login/switch';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SwitchAccountTypeResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a user access token
     * Generate a user access token that can be used to authenticate with the Mattermost REST API.
     *
     * __Minimum server version__: 4.1
     *
     * ##### Permissions
     * Must have `create_user_access_token` permission. For non-self requests, must also have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createUserAccessToken(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\CreateUserAccessTokenRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\UserAccessToken|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/tokens';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\UserAccessToken::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get user access tokens
     * Get a list of user access tokens for a user. Does not include the actual authentication tokens. Use query parameters for paging.
     *
     * __Minimum server version__: 4.1
     *
     * ##### Permissions
     * Must have `read_user_access_token` permission. For non-self requests, must also have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserAccessTokensForUser(
        /** User GUID */
        string $user_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of tokens per page. */
        ?int $per_page = 60,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUserAccessTokensForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/tokens';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUserAccessTokensForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get user access tokens
     * Get a page of user access tokens for users on the system. Does not include the actual authentication tokens. Use query parameters for paging.
     *
     * __Minimum server version__: 4.7
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserAccessTokens(
        /** The page to select. */
        ?int $page = 0,
        /** The number of tokens per page. */
        ?int $per_page = 60,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUserAccessTokensResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/tokens';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUserAccessTokensResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Revoke a user access token
     * Revoke a user access token and delete any sessions using the token.
     *
     * __Minimum server version__: 4.1
     *
     * ##### Permissions
     * Must have `revoke_user_access_token` permission. For non-self requests, must also have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function revokeUserAccessToken(
        \CedricZiel\MattermostPhp\Client\Model\RevokeUserAccessTokenRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/tokens/revoke';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Get a user access token
     * Get a user access token. Does not include the actual authentication token.
     *
     * __Minimum server version__: 4.1
     *
     * ##### Permissions
     * Must have `read_user_access_token` permission. For non-self requests, must also have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserAccessToken(
        /** User access token GUID */
        string $token_id,
    ): \CedricZiel\MattermostPhp\Client\Model\UserAccessTokenSanitized|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/tokens/{token_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['token_id'] = $token_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UserAccessTokenSanitized::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Disable personal access token
     * Disable a personal access token and delete any sessions using the token. The token can be re-enabled using `/users/tokens/enable`.
     *
     * __Minimum server version__: 4.4
     *
     * ##### Permissions
     * Must have `revoke_user_access_token` permission. For non-self requests, must also have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function disableUserAccessToken(
        \CedricZiel\MattermostPhp\Client\Model\DisableUserAccessTokenRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/tokens/disable';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Enable personal access token
     * Re-enable a personal access token that has been disabled.
     *
     * __Minimum server version__: 4.4
     *
     * ##### Permissions
     * Must have `create_user_access_token` permission. For non-self requests, must also have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function enableUserAccessToken(
        \CedricZiel\MattermostPhp\Client\Model\EnableUserAccessTokenRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/tokens/enable';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Search tokens
     * Get a list of tokens based on search criteria provided in the request body. Searches are done against the token id, user id and username.
     *
     * __Minimum server version__: 4.7
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchUserAccessTokens(
        \CedricZiel\MattermostPhp\Client\Model\SearchUserAccessTokensRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\SearchUserAccessTokensResponse
    {
        $path = '/api/v4/users/tokens/search';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\SearchUserAccessTokensResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a user's authentication method
     * Updates a user's authentication method. This can be used to change them to/from LDAP authentication for example.
     *
     * __Minimum server version__: 4.6
     * ##### Permissions
     * Must have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateUserAuth(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateUserAuthRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\UserAuthData|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/{user_id}/auth';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UserAuthData::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Records user action when they accept or decline custom terms of service
     * Records user action when they accept or decline custom terms of service. Records the action in audit table.
     * Updates user's last accepted terms of service ID if they accepted it.
     *
     * __Minimum server version__: 5.4
     * ##### Permissions
     * Must be logged in as the user being acted on.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function registerTermsOfServiceAction(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\RegisterTermsOfServiceActionRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/terms_of_service';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
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
     * Fetches user's latest terms of service action if the latest action was for acceptance.
     * Will be deprecated in v6.0
     * Fetches user's latest terms of service action if the latest action was for acceptance.
     *
     * __Minimum server version__: 5.6
     * ##### Permissions
     * Must be logged in as the user being acted on.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserTermsOfService(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\UserTermsOfService|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\AppError
    {
        $path = '/api/v4/users/{user_id}/terms_of_service';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UserTermsOfService::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\AppError::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Revoke all sessions from all users.
     * For any session currently on the server (including admin) it will be revoked.
     * Clients will be notified to log out users.
     *
     * __Minimum server version__: 5.14
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function revokeSessionsFromAllUsers(
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/sessions/revoke/all';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Publish a user typing websocket event.
     * Notify users in the given channel via websocket that the given user is typing.
     * __Minimum server version__: 5.26
     * ##### Permissions
     * Must have `manage_system` permission to publish for any user other than oneself.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function publishUserTyping(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\PublishUserTypingRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/typing';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get uploads for a user
     * Gets all the upload sessions belonging to a user.
     *
     * __Minimum server version__: 5.28
     *
     * ##### Permissions
     * Must be logged in as the user who created the upload sessions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUploadsForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUploadsForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/uploads';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUploadsForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get all channel members from all teams for a user
     * Get all channel members from all teams for a user.
     *
     * __Minimum server version__: 6.2.0
     *
     * ##### Permissions
     * Logged in as the user, or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelMembersWithTeamDataForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** Page specifies which part of the results to return, by PageSize. */
        ?int $page = null,
        /** PageSize specifies the size of the returned chunk of results. */
        ?int $pageSize = null,
    ): \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersWithTeamDataForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/channel_members';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['pageSize'] = $pageSize;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersWithTeamDataForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Migrate user accounts authentication type to LDAP.
     * Migrates accounts from one authentication provider to another. For example, you can upgrade your authentication provider from email to LDAP.
     * __Minimum server version__: 5.28
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function migrateAuthToLdap(
        \CedricZiel\MattermostPhp\Client\Model\MigrateAuthToLdapRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/migrate_auth/ldap';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Migrate user accounts authentication type to SAML.
     * Migrates accounts from one authentication provider to another. For example, you can upgrade your authentication provider from email to SAML.
     * __Minimum server version__: 5.28
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function migrateAuthToSaml(
        \CedricZiel\MattermostPhp\Client\Model\MigrateAuthToSamlRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/users/migrate_auth/saml';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get users with invalid emails
     * Get users whose emails are considered invalid.
     * It is an error to invoke this API if your team settings enable an open server.
     * ##### Permissions
     * Requires `sysconsole_read_user_management_users`.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUsersWithInvalidEmails(
        /** The page to select. */
        ?int $page = 0,
        /** The number of users per page. There is a maximum limit of 200 users per page. */
        ?int $per_page = 60,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUsersWithInvalidEmailsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/invalid_emails';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUsersWithInvalidEmailsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a list of paged and sorted users for admin reporting purposes
     * Get a list of paged users for admin reporting purposes, based on provided parameters.
     * Must be a system admin to invoke this API.
     * ##### Permissions
     * Requires `sysconsole_read_user_management_users`.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
        ?string $from_column_value = null,
        /** The value of the user id corresponding to the cursor to read from. Should be blank for the first page asked for. */
        ?string $from_id = null,
        /** The date range of the post statistics to display. Must be one of ("last30days", "previousmonth", "last6months", "alltime"). Will default to 'alltime' if the input is not valid. */
        ?string $date_range = 'alltime',
        /** Filter users by their role. */
        ?string $role_filter = null,
        /** Filter users by a specified team ID. */
        ?string $team_filter = null,
        /** If true, show only users that have no team. Will ignore provided "team_filter" if true. */
        ?bool $has_no_team = null,
        /** If true, show only users that are inactive. Cannot be used at the same time as "hide_inactive" */
        ?bool $hide_active = null,
        /** If true, show only users that are active. Cannot be used at the same time as "hide_active" */
        ?bool $hide_inactive = null,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUsersForReportingResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse
    {
        $path = '/api/v4/reports/users';
        $method = 'get';
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

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUsersForReportingResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Gets the user limits for the server
     * Gets the user limits for the server
     * ##### Permissions
     * Requires `sysconsole_read_user_management_users`.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserLimits(
    ): \CedricZiel\MattermostPhp\Client\Model\getUserLimitsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse
    {
        $path = '/api/v4/limits/users';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\getUserLimitsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }
}
