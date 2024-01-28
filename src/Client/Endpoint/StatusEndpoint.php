<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class StatusEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        protected string $token,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
    ) {
        $this->httpClient = $httpClient ?? \Http\Discovery\Psr18ClientDiscovery::find();
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function setToken(string $token): static
    {
        $this->token = $token;
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
    ): \CedricZiel\MattermostPhp\Client\Model\Status|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/{user_id}/status';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Status::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\UpdateUserStatusRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Status|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/{user_id}/status';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Status::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get user statuses by id
     * Get a list of user statuses by id from the server.
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUsersStatusesByIds(
        \CedricZiel\MattermostPhp\Client\Model\GetUsersStatusesByIdsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUsersStatusesByIdsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/status/ids';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUsersStatusesByIdsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\UpdateUserCustomStatusRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/{user_id}/status/custom';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/{user_id}/status/custom';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\RemoveRecentCustomStatusRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/{user_id}/status/custom/recent';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\PostUserRecentCustomStatusDeleteRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $path = '/api/v4/users/{user_id}/status/custom/recent/delete';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }
}
