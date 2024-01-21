<?php

namespace CedricZiel\MattermostPhp\Client;

class ThreadsEndpoint
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
     * Get all threads that user is following
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
        return [];
    }

    /**
     * Get all unread mention counts from followed threads, per-channel
     */
    public function getThreadMentionCountsByChannel(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads/mention_counts';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Mark all threads that user is following as read
     */
    public function updateThreadsReadForUser(
        /** The ID of the user. This can also be "me" which will point to the current user. */
        string $user_id,
        /** The ID of the team in which the thread is. */
        string $team_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/teams/{team_id}/threads/read';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Mark a thread that user is following read state to the timestamp
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;
        $pathParameters['timestamp'] = $timestamp;
        return [];
    }

    /**
     * Mark a thread that user is following as unread based on a post id
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Start following a thread
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;
        return [];
    }

    /**
     * Stop following a thread
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;
        return [];
    }

    /**
     * Get a thread followed by the user
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['team_id'] = $team_id;
        $pathParameters['thread_id'] = $thread_id;
        return [];
    }
}
;