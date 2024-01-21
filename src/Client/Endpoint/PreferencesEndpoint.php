<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class PreferencesEndpoint
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
     * Get the user's preferences
     * Get a list of the user's preferences.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPreferences(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Save the user's preferences
     * Save a list of the user's preferences.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updatePreferences(
        /** User GUID */
        string $user_id,
        \UpdatePreferencesRequest $requestBody,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Delete user's preferences
     * Delete a list of the user's preferences.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deletePreferences(
        /** User GUID */
        string $user_id,
        \DeletePreferencesRequest $requestBody,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences/delete';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * List a user's preferences by category
     * Lists the current user's stored preferences in the given category.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPreferencesByCategory(
        /** User GUID */
        string $user_id,
        /** The category of a group of preferences */
        string $category,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences/{category}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['category'] = $category;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a specific user preference
     * Gets a single preference for the current user with the given category and name.
     * ##### Permissions
     * Must be logged in as the user being updated or have the `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getPreferencesByCategoryByName(
        /** User GUID */
        string $user_id,
        /** The category of a group of preferences */
        string $category,
        /** The name of the preference */
        string $preference_name,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences/{category}/name/{preference_name}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $pathParameters['category'] = $category;
        $pathParameters['preference_name'] = $preference_name;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
