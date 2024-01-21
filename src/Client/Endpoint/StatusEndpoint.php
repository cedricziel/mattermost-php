<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class StatusEndpoint
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
     * Get user status
     * Get user status by id from the server.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserStatus(
        /** User ID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status';
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
     * Update user status
     * Manually set a user's status. When setting a user's status, the status will remain that value until set "online" again, which will return the status to being automatically updated based on user activity.
     * ##### Permissions
     * Must have `edit_other_users` permission for the team.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateUserStatus(
        /** User ID */
        string $user_id,
        \UpdateUserStatusRequest $requestBody,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status';
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
     * Get user statuses by id
     * Get a list of user statuses by id from the server.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUsersStatusesByIds(\GetUsersStatusesByIdsRequest $requestBody): array
    {
        $path = '/api/v4/users/status/ids';
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
     * Update user custom status
     * Updates a user's custom status by setting the value in the user's props and updates the user. Also save the given custom status to the recent custom statuses in the user's props
     * ##### Permissions
     * Must be logged in as the user whose custom status is being updated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateUserCustomStatus(
        /** User ID */
        string $user_id,
        \UpdateUserCustomStatusRequest $requestBody,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status/custom';
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
     * Unsets user custom status
     * Unsets a user's custom status by updating the user's props and updates the user
     * ##### Permissions
     * Must be logged in as the user whose custom status is being removed.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function unsetUserCustomStatus(
        /** User ID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status/custom';
        $method = 'delete';
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
     * Delete user's recent custom status
     * Deletes a user's recent custom status by removing the specific status from the recentCustomStatuses in the user's props and updates the user.
     * ##### Permissions
     * Must be logged in as the user whose recent custom status is being deleted.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function removeRecentCustomStatus(
        /** User ID */
        string $user_id,
        \RemoveRecentCustomStatusRequest $requestBody,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status/custom/recent';
        $method = 'delete';
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
     * Delete user's recent custom status
     * Deletes a user's recent custom status by removing the specific status from the recentCustomStatuses in the user's props and updates the user.
     * ##### Permissions
     * Must be logged in as the user whose recent custom status is being deleted.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function postUserRecentCustomStatusDelete(
        /** User ID */
        string $user_id,
        \PostUserRecentCustomStatusDeleteRequest $requestBody,
    ): array
    {
        $path = '/api/v4/users/{user_id}/status/custom/recent/delete';
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
}
