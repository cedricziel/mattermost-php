<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class ReactionsEndpoint
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
     * Create a reaction
     * Create a reaction.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function saveReaction(\SaveReactionRequest $requestBody): array
    {
        $path = '/api/v4/reactions';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a list of reactions to a post
     * Get a list of reactions made by all users to a given post.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getReactions(
        /** ID of a post */
        string $post_id,
    ): array
    {
        $path = '/api/v4/posts/{post_id}/reactions';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['post_id'] = $post_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Remove a reaction from a post
     * Deletes a reaction made by a user from the given post.
     * ##### Permissions
     * Must be user or have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteReaction(
        /** ID of the user */
        string $user_id,
        /** ID of the post */
        string $post_id,
        /** emoji name */
        string $emoji_name,
    ): array
    {
        $path = '/api/v4/users/{user_id}/posts/{post_id}/reactions/{emoji_name}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;
        $pathParameters['emoji_name'] = $emoji_name;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Bulk get the reaction for posts
     * Get a list of reactions made by all users to a given post.
     * ##### Permissions
     * Must have `read_channel` permission for the channel the post is in.
     *
     * __Minimum server version__: 5.8
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getBulkReactions(\GetBulkReactionsRequest $requestBody): array
    {
        $path = '/api/v4/posts/ids/reactions';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
