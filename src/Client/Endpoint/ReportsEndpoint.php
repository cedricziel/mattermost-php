<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class ReportsEndpoint
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
     * Get a list of paged and sorted users for admin reporting purposes
     * Get a list of paged users for admin reporting purposes, based on provided parameters.
     * ##### Permissions
     * Requires `sysconsole_read_user_management_users`.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\UserReport[]
     */
    public function getUsersForReporting(
        /** The column to sort the users by. Must be one of ("CreateAt", "Username", "FirstName", "LastName", "Nickname", "Email") or the API will return an error. */
        ?string $sort_column = 'Username',
        /** The direction to accept paging values from. Will return values ahead of the cursor if "prev", and below the cursor if "next". Default is "next". */
        ?string $direction = 'next',
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
        /** A filtering search term that allows filtering by Username, FirstName, LastName, Nickname or Email */
        ?string $search_term = null,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
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
        $queryParameters['search_term'] = $search_term;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/reports/users', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UserReport::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Gets the full count of users that match the filter.
     * Get the full count of users admin reporting purposes, based on provided parameters.
     * ##### Permissions
     * Requires `sysconsole_read_user_management_users`.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserCountForReporting(
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
        /** A filtering search term that allows filtering by Username, FirstName, LastName, Nickname or Email */
        ?string $search_term = null,
    ): int {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['role_filter'] = $role_filter;
        $queryParameters['team_filter'] = $team_filter;
        $queryParameters['has_no_team'] = $has_no_team;
        $queryParameters['hide_active'] = $hide_active;
        $queryParameters['hide_inactive'] = $hide_inactive;
        $queryParameters['search_term'] = $search_term;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/reports/users/count', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Starts a job to export the users to a report file.
     * Starts a job to export the users to a report file.
     * ##### Permissions
     * Requires `sysconsole_read_user_management_users`.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\UserReport[]
     */
    public function startBatchUsersExport(
        /** The date range of the post statistics to display. Must be one of ("last30days", "previousmonth", "last6months", "alltime"). Will default to 'alltime' if the input is not valid. */
        ?string $date_range = 'alltime',
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['date_range'] = $date_range;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/reports/users/export', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UserReport::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get posts for reporting and compliance purposes using cursor-based pagination
     * Get posts from a specific channel for reporting, compliance, and auditing purposes. This endpoint uses cursor-based pagination to efficiently retrieve large datasets.
     * The cursor is an opaque, base64-encoded token that contains all pagination state. Clients should treat the cursor as an opaque string and pass it back unchanged. When a cursor is provided, query parameters from the initial request are embedded in the cursor and take precedence over request body parameters.
     * ##### Permissions
     * Requires `manage_system` permission (system admin only).
     * ##### License
     * Requires an Enterprise license (or higher).
     * ##### Features
     * - Cursor-based pagination for efficient large dataset retrieval - Support for both create_at and update_at time fields - Ascending or descending sort order - Time range filtering with optional end_time - Include/exclude deleted posts - Exclude system posts (any type starting with "system_") - Optional metadata enrichment (file info, reactions, emojis, priority, acknowledgements)
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPostsForReporting(
        \CedricZiel\MattermostPhp\Client\Model\GetPostsForReportingRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GetPostsForReportingResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/reports/posts', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetPostsForReportingResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }
}
