<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class ThreadsEndpoint
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
     * Get all threads that user is following
     * Get all threads that user is following
     *
     * __Minimum server version__: 5.29
     *
     * ##### Permissions
     * Must be logged in as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserThreads(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
        /** Since filters the threads based on their LastUpdateAt timestamp. */
        ?int $since,
        /** Deleted will specify that even deleted threads should be returned (For mobile sync). */
        ?bool $deleted = false,
        /** Extended will enrich the response with participant details. */
        ?bool $extended = false,
        /** Page specifies which part of the results to return, by PageSize. */
        ?int $page = 0,
        /** PageSize specifies the size of the returned chunk of results. */
        ?int $pageSize = 30,
        /** Setting this to true will only return the total counts. */
        ?bool $totalsOnly = false,
        /** Setting this to true will only return threads. */
        ?bool $threadsOnly = false,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $queryParameters['since'] = $since;
        $queryParameters['deleted'] = $deleted;
        $queryParameters['extended'] = $extended;
        $queryParameters['page'] = $page;
        $queryParameters['pageSize'] = $pageSize;
        $queryParameters['totalsOnly'] = $totalsOnly;
        $queryParameters['threadsOnly'] = $threadsOnly;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get all unread mention counts from followed threads, per-channel
     * Get all unread mention counts from followed threads
     *
     * __Minimum server version__: 5.29
     *
     * ##### Permissions
     * Must be logged in as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getThreadMentionCountsByChannel(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads/mention_counts';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Mark all threads that user is following as read
     * Mark all threads that user is following as read
     *
     * __Minimum server version__: 5.29
     *
     * ##### Permissions
     * Must be logged in as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateThreadsReadForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads/read';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Mark a thread that user is following read state to the timestamp
     * Mark a thread that user is following as read
     *
     * __Minimum server version__: 5.29
     *
     * ##### Permissions
     * Must be logged in as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateThreadReadForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
        /** The ID of the thread to update */
        string $thread_id,
        /** The timestamp to which the thread's "last read" state will be reset. */
        string $timestamp,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads/{thread_id}/read/{timestamp}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;
        $pathParameters['timestamp'] = $timestamp;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Mark a thread that user is following as unread based on a post id
     * Mark a thread that user is following as unread
     *
     * __Minimum server version__: 6.7
     *
     * ##### Permissions
     * Must have `read_channel` permission for the channel the thread is in or if the channel is public, have the `read_public_channels` permission for the team.
     *
     * Must have `edit_other_users` permission if the user is not the one marking the thread for himself.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function setThreadUnreadByPostId(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
        /** The ID of the thread to update */
        string $thread_id,
        /** The ID of a post belonging to the thread to mark as unread. */
        string $post_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads/{thread_id}/set_unread/{post_id}';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;
        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Start following a thread
     * Start following a thread
     *
     * __Minimum server version__: 5.29
     *
     * ##### Permissions
     * Must be logged in as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function startFollowingThread(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
        /** The ID of the thread to follow */
        string $thread_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads/{thread_id}/following';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Stop following a thread
     * Stop following a thread
     *
     * __Minimum server version__: 5.29
     *
     * ##### Permissions
     * Must be logged in as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function stopFollowingThread(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
        /** The ID of the thread to update */
        string $thread_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads/{thread_id}/following';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a thread followed by the user
     * Get a thread
     *
     * __Minimum server version__: 5.29
     *
     * ##### Permissions
     * Must be logged in as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserThread(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
        /** The ID of the thread to follow */
        string $thread_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads/{thread_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
