<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class CustomProfileAttributesEndpoint
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
     * List all the Custom Profile Attributes fields
     * List all the Custom Profile Attributes fields.
     *
     * _This endpoint is experimental._
     *
     * __Minimum server version__: 10.5
     *
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @return \CedricZiel\MattermostPhp\Client\Model\PropertyField[]
     */
    public function listAllCPAFields(): array|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse
    {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/custom_profile_attributes/fields', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PropertyField::class . '[]';
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Create a Custom Profile Attribute field
     * Create a new Custom Profile Attribute field on the system.
     *
     * _This endpoint is experimental._
     *
     * __Minimum server version__: 10.5
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createCPAField(
        \CedricZiel\MattermostPhp\Client\Model\CreateCPAFieldRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\PropertyField|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/custom_profile_attributes/fields', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\PropertyField::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch a Custom Profile Attribute field
     * Partially update a Custom Profile Attribute field by providing
     * only the fields you want to update. Omitted fields will not be
     * updated. The fields that can be updated are defined in the
     * request body, all other provided fields will be ignored.
     *
     * _This endpoint is experimental._
     *
     * __Minimum server version__: 10.5
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchCPAField(
        /** Custom Profile Attribute field GUID */
        string $field_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchCPAFieldRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\PropertyField|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['field_id'] = $field_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/custom_profile_attributes/fields/{field_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PATCH', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\PropertyField::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Delete a Custom Profile Attribute field
     * Marks a Custom Profile Attribute field and all its values as
     * deleted.
     *
     * _This endpoint is experimental._
     *
     * __Minimum server version__: 10.5
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteCPAField(
        /** Custom Profile Attribute field GUID */
        string $field_id,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['field_id'] = $field_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/custom_profile_attributes/fields/{field_id}', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch Custom Profile Attribute values
     * Partially update a set of values on the requester's Custom
     * Profile Attribute fields by providing only the information you
     * want to update. Omitted fields will not be updated. The fields
     * that can be updated are defined in the request body, all other
     * provided fields will be ignored.
     *
     * _This endpoint is experimental._
     *
     * __Minimum server version__: 10.5
     *
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchCPAValues(
        \CedricZiel\MattermostPhp\Client\Model\PatchCPAValuesRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/custom_profile_attributes/values', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PATCH', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get Custom Profile Attribute property group data
     * Get the property group used for Custom Profile Attributes.
     *
     * __Minimum server version__: 10.8
     *
     * ##### Permissions
     * Must be authenticated.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getCPAGroup(
    ): \CedricZiel\MattermostPhp\Client\Model\GetCPAGroupResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/custom_profile_attributes/group', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetCPAGroupResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * List Custom Profile Attribute values
     * List all the Custom Profile Attributes values for specified user.
     *
     * _This endpoint is experimental._
     *
     * __Minimum server version__: 10.5
     *
     * ##### Permissions
     * Must have `view members` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function listCPAValues(
        /** User GUID */
        string $user_id,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/users/{user_id}/custom_profile_attributes', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Update custom profile attribute values for a user
     * Update Custom Profile Attribute field values for a specific user.
     *
     * _This endpoint is experimental._
     *
     * __Minimum server version__: 11
     *
     * ##### Permissions
     * Must have permission to edit the user. Users can only edit their own CPA values unless they are system administrators.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchCPAValuesForUser(
        /** User GUID */
        string $user_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchCPAValuesForUserRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse {
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/users/{user_id}/custom_profile_attributes', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('PATCH', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
        $request = $request->withBody($this->streamFactory->createStream(json_encode($requestBody) ?? ''));

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }
}
