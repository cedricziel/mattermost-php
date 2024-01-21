<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class OAuthEndpoint
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
     * Register OAuth app
     * Register an OAuth 2.0 client application with Mattermost as the service provider.
     * ##### Permissions
     * Must have `manage_oauth` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createOAuthApp(\CreateOAuthAppRequest $requestBody): array
    {
        $path = '/api/v4/oauth/apps';
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
     * Get OAuth apps
     * Get a page of OAuth 2.0 client applications registered with Mattermost.
     * ##### Permissions
     * With `manage_oauth` permission, the apps registered by the logged in user are returned. With `manage_system_wide_oauth` permission, all apps regardless of creator are returned.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getOAuthApps(
        /** The page to select. */
        ?int $page = 0,
        /** The number of apps per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/oauth/apps';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get an OAuth app
     * Get an OAuth 2.0 client application registered with Mattermost.
     * ##### Permissions
     * If app creator, must have `mange_oauth` permission otherwise `manage_system_wide_oauth` permission is required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getOAuthApp(
        /** Application client id */
        string $app_id,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Update an OAuth app
     * Update an OAuth 2.0 client application based on OAuth struct.
     * ##### Permissions
     * If app creator, must have `mange_oauth` permission otherwise `manage_system_wide_oauth` permission is required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateOAuthApp(
        /** Application client id */
        string $app_id,
        \UpdateOAuthAppRequest $requestBody,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Delete an OAuth app
     * Delete and unregister an OAuth 2.0 client application
     * ##### Permissions
     * If app creator, must have `mange_oauth` permission otherwise `manage_system_wide_oauth` permission is required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteOAuthApp(
        /** Application client id */
        string $app_id,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Regenerate OAuth app secret
     * Regenerate the client secret for an OAuth 2.0 client application registered with Mattermost.
     * ##### Permissions
     * If app creator, must have `mange_oauth` permission otherwise `manage_system_wide_oauth` permission is required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function regenerateOAuthAppSecret(
        /** Application client id */
        string $app_id,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}/regen_secret';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get info on an OAuth app
     * Get public information about an OAuth 2.0 client application registered with Mattermost. The application's client secret will be blanked out.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getOAuthAppInfo(
        /** Application client id */
        string $app_id,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}/info';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get authorized OAuth apps
     * Get a page of OAuth 2.0 client applications authorized to access a user's account.
     * ##### Permissions
     * Must be authenticated as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAuthorizedOAuthAppsForUser(
        /** User GUID */
        string $user_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of apps per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/users/{user_id}/oauth/apps/authorized';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}