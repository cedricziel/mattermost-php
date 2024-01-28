<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class PostsEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        protected string $token,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
    ) {
        $this->httpClient = $httpClient ?? \Http\Discovery\Psr18ClientDiscovery::find();
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
     * Create a post
     * Create a new post in a channel. To create the post as a comment on another post, provide `root_id`.
     * ##### Permissions
     * Must have `create_post` permission for the channel the post is being created in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createPost(
        /** Whether to set the user status as online or not. */
        ?bool $set_online,
        \CedricZiel\MattermostPhp\Client\Model\CreatePostRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Post|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['set_online'] = $set_online;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\Post::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a ephemeral post
     * Create a new ephemeral post in a channel.
     * ##### Permissions
     * Must have `create_post_ephemeral` permission (currently only given to system admin)
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createPostEphemeral(
        \CedricZiel\MattermostPhp\Client\Model\CreatePostEphemeralRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Post|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/ephemeral';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\Post::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a post
     * Get a single post.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in or if the channel is public, have the `read_public_channels` permission for the team.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPost(
        /** ID of the post to get */
        string $post_id,
        /** Defines if result should include deleted posts, must have 'manage_system' (admin) permission. */
        ?bool $include_deleted = false,
    ): \CedricZiel\MattermostPhp\Client\Model\Post|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/{post_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;
        $queryParameters['include_deleted'] = $include_deleted;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Post::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a post
     * Soft deletes a post, by marking the post as deleted in the database. Soft deleted posts will not be returned in post queries.
     * ##### Permissions
     * Must be logged in as the user or have `delete_others_posts` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deletePost(
        /** ID of the post to delete */
        string $post_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/{post_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a post
     * Update a post. Only the fields listed below are updatable, omitted fields will be treated as blank.
     * ##### Permissions
     * Must have `edit_post` permission for the channel the post is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updatePost(
        /** ID of the post to update */
        string $post_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdatePostRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Post|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/{post_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Post::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Mark as unread from a post.
     * Mark a channel as being unread from a given post.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in or if the channel is public, have the `read_public_channels` permission for the team.
     * Must have `edit_other_users` permission if the user is not the one marking the post for himself.
     *
     * __Minimum server version__: 5.18
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function setPostUnread(
        /** User GUID */
        string $user_id,
        /** Post GUID */
        string $post_id,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelUnreadAt|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/posts/{post_id}/set_unread';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ChannelUnreadAt::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch a post
     * Partially update a post by providing only the fields you want to update. Omitted fields will not be updated. The fields that can be updated are defined in the request body, all other provided fields will be ignored.
     * ##### Permissions
     * Must have the `edit_post` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchPost(
        /** Post GUID */
        string $post_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchPostRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Post|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/{post_id}/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Post::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a thread
     * Get a post and the rest of the posts in the same thread.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in or if the channel is public, have the `read_public_channels` permission for the team.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
    ): \CedricZiel\MattermostPhp\Client\Model\PostList|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/{post_id}/thread';
        $method = 'get';
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

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PostList::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a list of flagged posts
     * Get a page of flagged posts of a user provided user id string. Selects from a channel, team, or all flagged posts by a user. Will only return posts from channels in which the user is member.
     * ##### Permissions
     * Must be user or have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
    ): \CedricZiel\MattermostPhp\Client\Model\GetFlaggedPostsForUserResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/posts/flagged';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $queryParameters['team_id'] = $team_id;
        $queryParameters['channel_id'] = $channel_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetFlaggedPostsForUserResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get file info for post
     * Gets a list of file information objects for the files attached to a post.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getFileInfosForPost(
        /** ID of the post */
        string $post_id,
        /** Defines if result should include deleted posts, must have 'manage_system' (admin) permission. */
        ?bool $include_deleted = false,
    ): \CedricZiel\MattermostPhp\Client\Model\GetFileInfosForPostResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/{post_id}/files/info';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;
        $queryParameters['include_deleted'] = $include_deleted;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetFileInfosForPostResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get posts for a channel
     * Get a page of posts in a channel. Use the query parameters to modify the behaviour of this endpoint. The parameter `since` must not be used with any of `before`, `after`, `page`, and `per_page` parameters.
     * If `since` is used, it will always return all posts modified since that time, ordered by their create time limited till 1000. A caveat with this parameter is that there is no guarantee that the returned posts will be consecutive. It is left to the clients to maintain state and fill any missing holes in the post order.
     * ##### Permissions
     * Must have `read_channel` permission for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
    ): \CedricZiel\MattermostPhp\Client\Model\PostList|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/channels/{channel_id}/posts';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['since'] = $since;
        $queryParameters['before'] = $before;
        $queryParameters['after'] = $after;
        $queryParameters['include_deleted'] = $include_deleted;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PostList::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get posts around oldest unread
     * Get the oldest unread post in the channel for the given user as well as the posts around it. The returned list is sorted in descending order (most recent post first).
     * ##### Permissions
     * Must be logged in as the user or have `edit_other_users` permission, and must have `read_channel` permission for the channel.
     * __Minimum server version__: 5.14
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
    ): \CedricZiel\MattermostPhp\Client\Model\PostList|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/users/{user_id}/channels/{channel_id}/posts/unread';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['channel_id'] = $channel_id;
        $queryParameters['limit_before'] = $limit_before;
        $queryParameters['limit_after'] = $limit_after;
        $queryParameters['skipFetchThreads'] = $skipFetchThreads;
        $queryParameters['collapsedThreads'] = $collapsedThreads;
        $queryParameters['collapsedThreadsExtended'] = $collapsedThreadsExtended;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PostList::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search for team posts
     * Search posts in the team and from the provided terms string.
     * ##### Permissions
     * Must be authenticated and have the `view_team` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchPosts(
        /** Team GUID */
        string $team_id,
        \CedricZiel\MattermostPhp\Client\Model\SearchPostsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\PostListWithSearchMatches|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/teams/{team_id}/posts/search';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PostListWithSearchMatches::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Pin a post to the channel
     * Pin a post to a channel it is in based from the provided post id string.
     * ##### Permissions
     * Must be authenticated and have the `read_channel` permission to the channel the post is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function pinPost(
        /** Post GUID */
        string $post_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/{post_id}/pin';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Unpin a post to the channel
     * Unpin a post to a channel it is in based from the provided post id string.
     * ##### Permissions
     * Must be authenticated and have the `read_channel` permission to the channel the post is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function unpinPost(
        /** Post GUID */
        string $post_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/{post_id}/unpin';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Perform a post action
     * Perform a post action, which allows users to interact with integrations through posts.
     * ##### Permissions
     * Must be authenticated and have the `read_channel` permission to the channel the post is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function doPostAction(
        /** Post GUID */
        string $post_id,
        /** Action GUID */
        string $action_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/{post_id}/actions/{action_id}';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;
        $pathParameters['action_id'] = $action_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get posts by a list of ids
     * Fetch a list of posts based on the provided postIDs
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in or if the channel is public, have the `read_public_channels` permission for the team.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPostsByIds(
        \CedricZiel\MattermostPhp\Client\Model\GetPostsByIdsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\getPostsByIdsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/posts/ids';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\getPostsByIdsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Set a post reminder
     * Set a reminder for the user for the post.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in.
     *
     * __Minimum server version__: 7.2
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function setPostReminder(
        /** User GUID */
        string $user_id,
        /** Post GUID */
        string $post_id,
        \CedricZiel\MattermostPhp\Client\Model\SetPostReminderRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/posts/{post_id}/reminder';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

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
     * Acknowledge a post
     * Acknowledge a post that has a request for acknowledgements.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in.<br/> Must be logged in as the user or have `edit_other_users` permission.
     *
     * __Minimum server version__: 7.7
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function saveAcknowledgementForPost(
        /** User GUID */
        string $user_id,
        /** Post GUID */
        string $post_id,
    ): \CedricZiel\MattermostPhp\Client\Model\PostAcknowledgement|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/posts/{post_id}/ack';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PostAcknowledgement::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a post acknowledgement
     * Delete an acknowledgement form a post that you had previously acknowledged.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in.<br/> Must be logged in as the user or have `edit_other_users` permission.<br/> The post must have been acknowledged in the previous 5 minutes.
     *
     * __Minimum server version__: 7.7
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteAcknowledgementForPost(
        /** User GUID */
        string $user_id,
        /** Post GUID */
        string $post_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/users/{user_id}/posts/{post_id}/ack';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

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
     * Move a post (and any posts within that post's thread)
     * Move a post/thread to another channel.
     * THIS IS A BETA FEATURE. The API is subject to change without notice.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in. Must have `write_post` permission for the channel the post is being moved to.
     *
     * __Minimum server version__: 9.3
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function moveThread(
        /** The identifier of the post to move */
        string $post_id,
        \CedricZiel\MattermostPhp\Client\Model\MoveThreadRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/posts/{post_id}/move';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

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
}
