<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class Scheduled_postEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        protected string $token,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
        ?\Psr\Http\Message\StreamFactoryInterface $streamFactory = null,
    ) {
        $this->httpClient = $httpClient ?? \Http\Discovery\Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?? \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
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
     * Creates a scheduled post
     * Creates a scheduled post
     * ##### Permissions
     * Must have `create_post` permission for the channel the post is being created in.
     * __Minimum server version__: 10.3
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createScheduledPost(
        \CedricZiel\MattermostPhp\Client\Model\CreateScheduledPostRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\CreateScheduledPostResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/posts/schedule', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\CreateScheduledPostResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Gets all scheduled posts for a user for the specified team..
     * Get user-team scheduled posts
     * ##### Permissions
     * Must have `view_team` permission for the team the scheduled posts are being fetched for.
     * __Minimum server version__: 10.3
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getUserScheduledPosts(
        /** Path parameter: team_id */
        string $team_id,
        /** Whether to include scheduled posts from DMs an GMs or not. Default is false */
        ?bool $includeDirectChannels = false,
    ): \CedricZiel\MattermostPhp\Client\Model\GetUserScheduledPostsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['includeDirectChannels'] = $includeDirectChannels;
        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/posts/scheduled/team/{team_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetUserScheduledPostsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update a scheduled post
     * Updates a scheduled post
     * ##### Permissions
     * Must have `create_post` permission for the channel where the scheduled post belongs to.
     * __Minimum server version__: 10.3
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateScheduledPost(
        /** ID of the scheduled post to update */
        string $scheduled_post_id,
        \CedricZiel\MattermostPhp\Client\Model\UpdateScheduledPostRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\UpdateScheduledPostResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['scheduled_post_id'] = $scheduled_post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/posts/schedule/{scheduled_post_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UpdateScheduledPostResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a scheduled post
     * Delete a scheduled post
     * __Minimum server version__: 10.3
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteScheduledPost(
        /** ID of the scheduled post to delete */
        string $scheduled_post_id,
    ): \CedricZiel\MattermostPhp\Client\Model\DeleteScheduledPostResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['scheduled_post_id'] = $scheduled_post_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/posts/schedule/{scheduled_post_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\DeleteScheduledPostResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }
}
