<?php

namespace CedricZiel\MattermostPhp\Client;

class StatusEndpoint
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
     * Get user status
     */
    public function getUserStatus(
        /** User ID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Update user status
     */
    public function updateUserStatus(
        /** User ID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get user statuses by id
     */
    public function getUsersStatusesByIds(): array
    {
        $path = '/api/v4/users/status/ids';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Update user custom status
     */
    public function updateUserCustomStatus(
        /** User ID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status/custom';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Unsets user custom status
     */
    public function unsetUserCustomStatus(
        /** User ID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status/custom';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Delete user's recent custom status
     */
    public function removeRecentCustomStatus(
        /** User ID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status/custom/recent';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Delete user's recent custom status
     */
    public function postUserRecentCustomStatusDelete(
        /** User ID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status/custom/recent/delete';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }
}
;