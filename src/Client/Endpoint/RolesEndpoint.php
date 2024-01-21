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
    public function getAllRoles(): array
    {
        $path = '/api/v4/roles';
        $method = 'get';
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
    ): array
    {
        $path = '/api/v4/roles/{role_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['role_id'] = $role_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    ): array
    {
        $path = '/api/v4/roles/name/{role_name}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['role_name'] = $role_name;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
        \PatchRoleRequest $requestBody,
    ): array
    {
        $path = '/api/v4/roles/{role_id}/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['role_id'] = $role_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
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
    public function getRolesByNames(\GetRolesByNamesRequest $requestBody): array
    {
        $path = '/api/v4/roles/names';
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
}
