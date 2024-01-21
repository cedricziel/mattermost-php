<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class EmojiEndpoint
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
     * Create a custom emoji
     * Create a custom emoji for the team.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createEmoji(): array
    {
        $path = '/api/v4/emoji';
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
     * Get a list of custom emoji
     * Get a page of metadata for custom emoji on the system. Since server version 4.7, sort using the `sort` query parameter.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['sort'] = $sort;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a custom emoji
     * Get some metadata for a custom emoji.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getEmoji(
        /** Emoji GUID */
        string $emoji_id,
    ): array
    {
        $path = '/api/v4/emoji/{emoji_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['emoji_id'] = $emoji_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Delete a custom emoji
     * Delete a custom emoji.
     * ##### Permissions
     * Must have the `manage_team` or `manage_system` permissions or be the user who created the emoji.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteEmoji(
        /** Emoji GUID */
        string $emoji_id,
    ): array
    {
        $path = '/api/v4/emoji/{emoji_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['emoji_id'] = $emoji_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a custom emoji by name
     * Get some metadata for a custom emoji using its name.
     * ##### Permissions
     * Must be authenticated.
     *
     * __Minimum server version__: 4.7
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getEmojiByName(
        /** Emoji name */
        string $emoji_name,
    ): array
    {
        $path = '/api/v4/emoji/name/{emoji_name}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['emoji_name'] = $emoji_name;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get custom emoji image
     * Get the image for a custom emoji.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getEmojiImage(
        /** Emoji GUID */
        string $emoji_id,
    ): array
    {
        $path = '/api/v4/emoji/{emoji_id}/image';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['emoji_id'] = $emoji_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Search custom emoji
     * Search for custom emoji by name based on search criteria provided in the request body. A maximum of 200 results are returned.
     * ##### Permissions
     * Must be authenticated.
     *
     * __Minimum server version__: 4.7
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchEmoji(\SearchEmojiRequest $requestBody): array
    {
        $path = '/api/v4/emoji/search';
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
     * Autocomplete custom emoji
     * Get a list of custom emoji with names starting with or matching the provided name. Returns a maximum of 100 results.
     * ##### Permissions
     * Must be authenticated.
     *
     * __Minimum server version__: 4.7
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function autocompleteEmoji(
        /** The emoji name to search. */
        string $name,
    ): array
    {
        $path = '/api/v4/emoji/autocomplete';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['name'] = $name;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get custom emojis by name
     * Get a list of custom emoji based on a provided list of emoji names. A maximum of 200 results are returned.
     * ##### Permissions
     * Must be authenticated.
     * __Minimum server version__: 9.2
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getEmojisByNames(\GetEmojisByNamesRequest $requestBody): array
    {
        $path = '/api/v4/emoji/names';
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
