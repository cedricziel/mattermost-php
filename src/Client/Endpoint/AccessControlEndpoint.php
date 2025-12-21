<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class AccessControlEndpoint
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
     * Create an access control policy
     * Creates a new access control policy.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createAccessControlPolicy(
        \CedricZiel\MattermostPhp\Client\Model\CreateAccessControlPolicyRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\AccessControlPolicy|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AccessControlPolicy::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Check an access control policy expression
     * Checks the syntax and validity of an access control policy expression.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\ExpressionError[]
     */
    public function checkAccessControlPolicyExpression(
        \CedricZiel\MattermostPhp\Client\Model\CheckAccessControlPolicyExpressionRequest $requestBody,
    ): array|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/cel/check', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ExpressionError::class . '[]';
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Validate if the current user matches a CEL expression
     * Validates whether the current authenticated user matches the given CEL expression.
     * This is used to determine if a channel admin can test expressions they match.
     * ##### Permissions
     * Must have `manage_system` permission OR be a channel admin for the specified channel (channelId required for channel admins).
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function validateExpressionAgainstRequester(
        \CedricZiel\MattermostPhp\Client\Model\ValidateExpressionAgainstRequesterRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\ValidateExpressionAgainstRequesterResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/cel/validate_requester', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ValidateExpressionAgainstRequesterResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Test an access control policy expression
     * Tests an access control policy expression against users to see who would be affected.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function testAccessControlPolicyExpression(
        \CedricZiel\MattermostPhp\Client\Model\TestAccessControlPolicyExpressionRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\AccessControlPolicyTestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/cel/test', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AccessControlPolicyTestResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search access control policies
     * Searches for access control policies based on given criteria.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchAccessControlPolicies(
        \CedricZiel\MattermostPhp\Client\Model\SearchAccessControlPoliciesRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\AccessControlPoliciesWithCount|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/search', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AccessControlPoliciesWithCount::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get autocomplete fields for access control policies
     * Provides a list of fields that can be used for autocompletion when creating/editing access control policy expressions.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAccessControlPolicyAutocompleteFields(
        /** The maximum number of fields to return. */
        int $limit = 60,
        /** The field ID to start after for pagination. */
        ?string $after = null,
    ): \CedricZiel\MattermostPhp\Client\Model\AccessControlFieldsAutocompleteResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['after'] = $after;
        $queryParameters['limit'] = $limit;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/cel/autocomplete/fields', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AccessControlFieldsAutocompleteResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get an access control policy
     * Gets a specific access control policy by its ID.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAccessControlPolicy(
        /** The ID of the access control policy. */
        string $policy_id,
    ): \CedricZiel\MattermostPhp\Client\Model\AccessControlPolicy|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/{policy_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AccessControlPolicy::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete an access control policy
     * Deletes an access control policy by its ID.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteAccessControlPolicy(
        /** The ID of the access control policy. */
        string $policy_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/{policy_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Activate or deactivate an access control policy
     * Updates the active status of an access control policy.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateAccessControlPolicyActiveStatus(
        /** The ID of the access control policy. */
        string $policy_id,
        /** Set to "true" to activate, "false" to deactivate. */
        bool $active,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;
        $queryParameters['active'] = $active;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/{policy_id}/activate', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Assign an access control policy to channels
     * Assigns an access control policy to a list of channels.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function assignAccessControlPolicyToChannels(
        /** The ID of the access control policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\AssignAccessControlPolicyToChannelsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/{policy_id}/assign', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Unassign an access control policy from channels
     * Unassigns an access control policy from a list of channels.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function unassignAccessControlPolicyFromChannels(
        /** The ID of the access control policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\UnassignAccessControlPolicyFromChannelsRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/{policy_id}/unassign', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get channels for an access control policy
     * Retrieves a paginated list of channels to which a specific access control policy is applied.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelsForAccessControlPolicy(
        /** The ID of the access control policy. */
        string $policy_id,
        /** The maximum number of channels to return. */
        int $limit = 60,
        /** The channel ID to start after for pagination. */
        ?string $after = null,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelsWithCount|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;
        $queryParameters['after'] = $after;
        $queryParameters['limit'] = $limit;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/{policy_id}/resources/channels', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ChannelsWithCount::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Search channels for an access control policy
     * Searches for channels associated with a specific access control policy based on search criteria.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function searchChannelsForAccessControlPolicy(
        /** The ID of the access control policy. */
        string $policy_id,
        \CedricZiel\MattermostPhp\Client\Model\SearchChannelsForAccessControlPolicyRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\ChannelsWithCount|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['policy_id'] = $policy_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/{policy_id}/resources/channels/search', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ChannelsWithCount::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get access control attributes for a channel
     * Retrieves the effective access control policy attributes for a specific channel.
     * This can be used to understand what attributes are currently being applied to the channel by the access control system.
     * ##### Permissions
     * Must have `read_channel` permission for the specified channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelAccessControlAttributes(
        /** The ID of the channel. */
        string $channel_id,
    ): \CedricZiel\MattermostPhp\Client\Model\GetChannelAccessControlAttributesResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/channels/{channel_id}/access_control/attributes', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetChannelAccessControlAttributesResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get the visual AST for a CEL expression
     * Retrieves the visual AST for a CEL expression.
     * ##### Permissions
     * Must have the `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getCELVisualAST(
        \CedricZiel\MattermostPhp\Client\Model\GetCELVisualASTRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\VisualExpression|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/cel/visual_ast', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\VisualExpression::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Activate or deactivate access control policies
     * Updates the active status of access control policies.
     *
     * ##### Permissions
     * Must have the `manage_system` permission. OR be a channel admin with manage_channel_access_rules permission for the specified channels.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateAccessControlPoliciesActive(
        \CedricZiel\MattermostPhp\Client\Model\UpdateAccessControlPoliciesActiveRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\AccessControlPolicy|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/access_control_policies/activate', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PUT', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\AccessControlPolicy::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[500] = \CedricZiel\MattermostPhp\Client\Model\DefaultInternalServerErrorResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }
}
