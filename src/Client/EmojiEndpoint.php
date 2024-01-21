<?php

namespace CedricZiel\MattermostPhp\Client;

class EmojiEndpoint
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
     * Create a custom emoji
     */
    public function createEmoji(): array
    {
        $path = '/api/v4/emoji';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get a list of custom emoji
     */
    public function getEmojiList(
        /** The page to select. */
        ?int $page = 0,
        /** The number of emojis per page. */
        ?int $per_page = 60,
        /** Either blank for no sorting or "name" to sort by emoji names. Minimum server version for sorting is 4.7. */
        ?string $sort = '',
    ): array
    {
        $path = '/api/v4/emoji';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['sort'] = $sort;
        return [];
    }

    /**
     * Get a custom emoji
     */
    public function getEmoji(
        /** Emoji GUID */
        string $emoji_id,
    ): array
    {
        $path = '/api/v4/emoji/{emoji_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['emoji_id'] = $emoji_id;
        return [];
    }

    /**
     * Delete a custom emoji
     */
    public function deleteEmoji(
        /** Emoji GUID */
        string $emoji_id,
    ): array
    {
        $path = '/api/v4/emoji/{emoji_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['emoji_id'] = $emoji_id;
        return [];
    }

    /**
     * Get a custom emoji by name
     */
    public function getEmojiByName(
        /** Emoji name */
        string $emoji_name,
    ): array
    {
        $path = '/api/v4/emoji/name/{emoji_name}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['emoji_name'] = $emoji_name;
        return [];
    }

    /**
     * Get custom emoji image
     */
    public function getEmojiImage(
        /** Emoji GUID */
        string $emoji_id,
    ): array
    {
        $path = '/api/v4/emoji/{emoji_id}/image';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['emoji_id'] = $emoji_id;
        return [];
    }

    /**
     * Search custom emoji
     */
    public function searchEmoji(): array
    {
        $path = '/api/v4/emoji/search';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Autocomplete custom emoji
     */
    public function autocompleteEmoji(
        /** The emoji name to search. */
        string $name,
    ): array
    {
        $path = '/api/v4/emoji/autocomplete';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['name'] = $name;
        return [];
    }

    /**
     * Get custom emojis by name
     */
    public function getEmojisByNames(): array
    {
        $path = '/api/v4/emoji/names';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;