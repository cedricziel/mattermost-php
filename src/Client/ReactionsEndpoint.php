<?php

namespace CedricZiel\MattermostPhp\Client;

class ReactionsEndpoint
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
     * Create a reaction
     */
    public function saveReaction(): array
    {
        $path = '/api/v4/reactions';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a list of reactions to a post
     */
    public function getReactions(
        /** ID of a post */
        string $post_id,
    ): array
    {
        $path = '/api/v4/posts/{post_id}/reactions';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['post_id'] = $post_id;
        return [];
    }

    /**
     * Remove a reaction from a post
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['post_id'] = $post_id;
        $pathParameters['emoji_name'] = $emoji_name;
        return [];
    }

    /**
     * Bulk get the reaction for posts
     */
    public function getBulkReactions(): array
    {
        $path = '/api/v4/posts/ids/reactions';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;