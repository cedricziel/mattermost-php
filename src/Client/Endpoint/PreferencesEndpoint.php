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
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetPreferencesResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\UpdatePreferencesRequest $requestBody,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UpdatePreferencesResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\DeletePreferencesRequest $requestBody,
    ): array
    {
        $path = '/api/v4/users/{user_id}/preferences/delete';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\DeletePreferencesResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
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
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetPreferencesByCategoryResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
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
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetPreferencesByCategoryByNameResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }
}
