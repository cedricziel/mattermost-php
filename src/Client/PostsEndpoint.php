<?php

namespace CedricZiel\MattermostPhp\Client;

class PostsEndpoint
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
     * Create a post
     */
    public function createPost(
        /** Whether to set the user status as online or not. */
        ?bool $set_online,
    ): array
    {
        $path = '/api/v4/posts';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['set_online'] = $set_online;
        return [];
    }

    /**
     * Create a ephemeral post
     */
    public function createPostEphemeral(): array
    {
        $path = '/api/v4/posts/ephemeral';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a post
     */
    public function getPost(
        /** ID of the post to get */
        string $post_id,
        /** Defines if result should include deleted posts, must have 'manage_system' (admin) permission. */
        ?bool $include_deleted = false,
    ): array
    {
        $path = '/api/v4/posts/{post_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        $queryParameters['include_deleted'] = $include_deleted;
        return [];
    }

    /**
     * Delete a post
     */
    public function deletePost(
        /** ID of the post to delete */
        string $post_id,
    ): array
    {
        $path = '/api/v4/posts/{post_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Update a post
     */
    public function updatePost(
        /** ID of the post to update */
        string $post_id,
    ): array
    {
        $path = '/api/v4/posts/{post_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Mark as unread from a post.
     */
    public function setPostUnread(
        /** User GUID */
        string $user_id,
        /** Post GUID */
        string $post_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/posts/{post_id}/set_unread';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Patch a post
     */
    public function patchPost(
        /** Post GUID */
        string $post_id,
    ): array
    {
        $path = '/api/v4/posts/{post_id}/patch';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Get a thread
     */
    public function getPostThread(
        /** ID of a post in the thread */
        string $post_id,
        /** The number of posts per page */
        ?int $perPage = 0,
        /** The post_id to return the next page of posts from */
        ?string $fromPost = '',
        /** The create_at timestamp to return the next page of posts from */
        ?int $fromCreateAt = 0,
        /** The direction to return the posts. Either up or down. */
        ?string $direction = '',
        /** Whether to skip fetching threads or not */
        ?bool $skipFetchThreads = false,
        /** Whether the client uses CRT or not */
        ?bool $collapsedThreads = false,
        /** Whether to return the associated users as part of the response or not */
        ?bool $collapsedThreadsExtended = false,
    ): array
    {
        $path = '/api/v4/posts/{post_id}/thread';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        $queryParameters['perPage'] = $perPage;
        $queryParameters['fromPost'] = $fromPost;
        $queryParameters['fromCreateAt'] = $fromCreateAt;
        $queryParameters['direction'] = $direction;
        $queryParameters['skipFetchThreads'] = $skipFetchThreads;
        $queryParameters['collapsedThreads'] = $collapsedThreads;
        $queryParameters['collapsedThreadsExtended'] = $collapsedThreadsExtended;
        return [];
    }

    /**
     * Get a list of flagged posts
     */
    public function getFlaggedPostsForUser(
        /** ID of the user */
        string $user_id,
        /** Team ID */
        ?string $team_id,
        /** Channel ID */
        ?string $channel_id,
        /** The page to select */
        ?int $page = 0,
        /** The number of posts per page */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/users/{user_id}/posts/flagged';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $queryParameters['team_id'] = $team_id;
        $queryParameters['channel_id'] = $channel_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get file info for post
     */
    public function getFileInfosForPost(
        /** ID of the post */
        string $post_id,
        /** Defines if result should include deleted posts, must have 'manage_system' (admin) permission. */
        ?bool $include_deleted = false,
    ): array
    {
        $path = '/api/v4/posts/{post_id}/files/info';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        $queryParameters['include_deleted'] = $include_deleted;
        return [];
    }

    /**
     * Get posts for a channel
     */
    public function getPostsForChannel(
        /** The channel ID to get the posts for */
        string $channel_id,
        /** The page to select */
        ?int $page = 0,
        /** The number of posts per page */
        ?int $per_page = 60,
        /** Provide a non-zero value in Unix time milliseconds to select posts modified after that time */
        ?int $since,
        /** A post id to select the posts that came before this one */
        ?string $before,
        /** A post id to select the posts that came after this one */
        ?string $after,
        /** Whether to include deleted posts or not. Must have system admin permissions. */
        ?bool $include_deleted = false,
    ): array
    {
        $path = '/api/v4/channels/{channel_id}/posts';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['since'] = $since;
        $queryParameters['before'] = $before;
        $queryParameters['after'] = $after;
        $queryParameters['include_deleted'] = $include_deleted;
        return [];
    }

    /**
     * Get posts around oldest unread
     */
    public function getPostsAroundLastUnread(
        /** ID of the user */
        string $user_id,
        /** The channel ID to get the posts for */
        string $channel_id,
        /** Number of posts before the oldest unread posts. Maximum is 200 posts if limit is set greater than that. */
        ?int $limit_before = 60,
        /** Number of posts after and including the oldest unread post. Maximum is 200 posts if limit is set greater than that. */
        ?int $limit_after = 60,
        /** Whether to skip fetching threads or not */
        ?bool $skipFetchThreads = false,
        /** Whether the client uses CRT or not */
        ?bool $collapsedThreads = false,
        /** Whether to return the associated users as part of the response or not */
        ?bool $collapsedThreadsExtended = false,
    ): array
    {
        $path = '/api/v4/users/{user_id}/channels/{channel_id}/posts/unread';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['limit_before'] = $limit_before;
        $queryParameters['limit_after'] = $limit_after;
        $queryParameters['skipFetchThreads'] = $skipFetchThreads;
        $queryParameters['collapsedThreads'] = $collapsedThreads;
        $queryParameters['collapsedThreadsExtended'] = $collapsedThreadsExtended;
        return [];
    }

    /**
     * Search for team posts
     */
    public function searchPosts(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/posts/search';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Pin a post to the channel
     */
    public function pinPost(
        /** Post GUID */
        string $post_id,
    ): array
    {
        $path = '/api/v4/posts/{post_id}/pin';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Unpin a post to the channel
     */
    public function unpinPost(
        /** Post GUID */
        string $post_id,
    ): array
    {
        $path = '/api/v4/posts/{post_id}/unpin';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Perform a post action
     */
    public function doPostAction(
        /** Post GUID */
        string $post_id,
        /** Action GUID */
        string $action_id,
    ): array
    {
        $path = '/api/v4/posts/{post_id}/actions/{action_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        $pathParameters['action_id'] = $action_id;
        return [];
    }

    /**
     * Get posts by a list of ids
     */
    public function getPostsByIds(): array
    {
        $path = '/api/v4/posts/ids';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Set a post reminder
     */
    public function setPostReminder(
        /** User GUID */
        string $user_id,
        /** Post GUID */
        string $post_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/posts/{post_id}/reminder';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Acknowledge a post
     */
    public function saveAcknowledgementForPost(
        /** User GUID */
        string $user_id,
        /** Post GUID */
        string $post_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/posts/{post_id}/ack';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Delete a post acknowledgement
     */
    public function deleteAcknowledgementForPost(
        /** User GUID */
        string $user_id,
        /** Post GUID */
        string $post_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/posts/{post_id}/ack';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Move a post (and any posts within that post's thread)
     */
    public function moveThread(
        /** The identifier of the post to move */
        string $post_id,
    ): array
    {
        $path = '/api/v4/posts/{post_id}/move';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        return [];
    }
}
;