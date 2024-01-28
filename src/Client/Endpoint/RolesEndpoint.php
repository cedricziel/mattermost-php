<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class RolesEndpoint
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
     * Get a list of all the roles
     * ##### Permissions
     *
     * `manage_system` permission is required.
     *
     * __Minimum server version__: 5.33
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAllRoles(
    ): \CedricZiel\MattermostPhp\Client\Model\GetAllRolesResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/roles';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetAllRolesResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a role
     * Get a role from the provided role id.
     *
     * ##### Permissions
     * Requires an active session but no other permissions.
     *
     * __Minimum server version__: 4.9
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getRole(
        /** Role GUID */
        string $role_id,
    ): \CedricZiel\MattermostPhp\Client\Model\Role|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/roles/{role_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['role_id'] = $role_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Role::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a role
     * Get a role from the provided role name.
     *
     * ##### Permissions
     * Requires an active session but no other permissions.
     *
     * __Minimum server version__: 4.9
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getRoleByName(
        /** Role Name */
        string $role_name,
    ): \CedricZiel\MattermostPhp\Client\Model\Role|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/roles/name/{role_name}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['role_name'] = $role_name;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Role::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Patch a role
     * Partially update a role by providing only the fields you want to update. Omitted fields will not be updated. The fields that can be updated are defined in the request body, all other provided fields will be ignored.
     *
     * ##### Permissions
     * `manage_system` permission is required.
     *
     * __Minimum server version__: 4.9
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchRole(
        /** Role GUID */
        string $role_id,
        \CedricZiel\MattermostPhp\Client\Model\PatchRoleRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\Role|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/roles/{role_id}/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['role_id'] = $role_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\Role::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Get a list of roles by name
     * Get a list of roles from their names.
     *
     * ##### Permissions
     * Requires an active session but no other permissions.
     *
     * __Minimum server version__: 4.9
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getRolesByNames(
        \CedricZiel\MattermostPhp\Client\Model\GetRolesByNamesRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\GetRolesByNamesResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/roles/names';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetRolesByNamesResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }
}
