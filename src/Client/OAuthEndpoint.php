<?php

namespace CedricZiel\MattermostPhp\Client;

class OAuthEndpoint
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
     * Register OAuth app
     */
    public function createOAuthApp(): array
    {
        $path = '/api/v4/oauth/apps';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get OAuth apps
     */
    public function getOAuthApps(
        /** The page to select. */
        ?int $page = 0,
        /** The number of apps per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/oauth/apps';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }

    /**
     * Get an OAuth app
     */
    public function getOAuthApp(
        /** Application client id */
        string $app_id,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['app_id'] = $app_id;
        return [];
    }

    /**
     * Update an OAuth app
     */
    public function updateOAuthApp(
        /** Application client id */
        string $app_id,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['app_id'] = $app_id;
        return [];
    }

    /**
     * Delete an OAuth app
     */
    public function deleteOAuthApp(
        /** Application client id */
        string $app_id,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['app_id'] = $app_id;
        return [];
    }

    /**
     * Regenerate OAuth app secret
     */
    public function regenerateOAuthAppSecret(
        /** Application client id */
        string $app_id,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}/regen_secret';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['app_id'] = $app_id;
        return [];
    }

    /**
     * Get info on an OAuth app
     */
    public function getOAuthAppInfo(
        /** Application client id */
        string $app_id,
    ): array
    {
        $path = '/api/v4/oauth/apps/{app_id}/info';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['app_id'] = $app_id;
        return [];
    }

    /**
     * Get authorized OAuth apps
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
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        return [];
    }
}
;