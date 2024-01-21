<?php

namespace CedricZiel\MattermostPhp\Client;

class PreferencesEndpoint
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
     * Get the user's preferences
     */
    public function getPreferences(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Save the user's preferences
     */
    public function updatePreferences(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Delete user's preferences
     */
    public function deletePreferences(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences/delete';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * List a user's preferences by category
     */
    public function getPreferencesByCategory(
        /** User GUID */
        string $user_id,
        /** The category of a group of preferences */
        string $category,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences/{category}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['category'] = $category;
        return [];
    }

    /**
     * Get a specific user preference
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $pathParameters['category'] = $category;
        $pathParameters['preference_name'] = $preference_name;
        return [];
    }
}
;