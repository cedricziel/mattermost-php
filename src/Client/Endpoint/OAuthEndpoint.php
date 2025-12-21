<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class OAuthEndpoint
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
     * Register OAuth app
     * Register an OAuth 2.0 client application with Mattermost as the service provider.
     * ##### Permissions
     * Must have `manage_oauth` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createOAuthApp(
        \CedricZiel\MattermostPhp\Client\Model\CreateOAuthAppRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\OAuthApp|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/oauth/apps', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\OAuthApp::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get OAuth apps
     * Get a page of OAuth 2.0 client applications registered with Mattermost.
     * ##### Permissions
     * With `manage_oauth` permission, the apps registered by the logged in user are returned. With `manage_system_wide_oauth` permission, all apps regardless of creator are returned.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\OAuthApp[]
     */
    public function getOAuthApps(
        /** The page to select. */
        ?int $page = 0,
        /** The number of apps per page. */
        ?int $per_page = 60,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/oauth/apps', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OAuthApp::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\OAuthApp|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/oauth/apps/{app_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OAuthApp::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\UpdateOAuthAppRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\OAuthApp|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/oauth/apps/{app_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OAuthApp::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/oauth/apps/{app_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\OAuthApp|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/oauth/apps/{app_id}/regen_secret', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OAuthApp::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\OAuthApp|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['app_id'] = $app_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/oauth/apps/{app_id}/info', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OAuthApp::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get OAuth 2.0 Authorization Server Metadata
     * Get the OAuth 2.0 Authorization Server Metadata as defined in RFC 8414. This endpoint provides metadata about the OAuth 2.0 authorization server's configuration, including supported endpoints, grant types, response types, and authentication methods.
     * ##### Permissions
     * No authentication required. This endpoint is publicly accessible to allow OAuth clients to discover the authorization server's configuration.
     * ##### Notes
     * - This endpoint implements RFC 8414 (OAuth 2.0 Authorization Server Metadata) - The metadata is dynamically generated based on the server's configuration - OAuth Service Provider must be enabled in system settings for this endpoint to be available
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAuthorizationServerMetadata(
    ): \CedricZiel\MattermostPhp\Client\Model\AuthorizationServerMetadata|\CedricZiel\MattermostPhp\Client\Model\AppError {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/.well-known/oauth-authorization-server', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AuthorizationServerMetadata::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\AppError::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Register OAuth client using Dynamic Client Registration
     * Register an OAuth 2.0 client application using Dynamic Client Registration (DCR) as defined in RFC 7591. This endpoint allows clients to register without requiring administrative approval.
     * ##### Permissions
     * No authentication required. This endpoint implements the OAuth 2.0 Dynamic Client Registration Protocol and can be called by unauthenticated clients.
     * ##### Notes
     * - This endpoint follows RFC 7591 (OAuth 2.0 Dynamic Client Registration Protocol) - The `client_uri` field, when provided, will be mapped to the OAuth app's homepage - All registered clients are marked as dynamically registered - Dynamic client registration must be enabled in system settings
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function registerOAuthClient(
        \CedricZiel\MattermostPhp\Client\Model\RegisterOAuthClientRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\ClientRegistrationResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/oauth/apps/register', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\ClientRegistrationResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get authorized OAuth apps
     * Get a page of OAuth 2.0 client applications authorized to access a user's account.
     * ##### Permissions
     * Must be authenticated as the user or have `edit_other_users` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\OAuthApp[]
     */
    public function getAuthorizedOAuthAppsForUser(
        /** User GUID */
        string $user_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of apps per page. */
        ?int $per_page = 60,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/users/{user_id}/oauth/apps/authorized', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OAuthApp::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }
}
