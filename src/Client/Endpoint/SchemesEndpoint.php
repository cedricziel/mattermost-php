<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class SchemesEndpoint
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
     * Get the schemes.
     * Get a page of schemes. Use the query parameters to modify the behaviour of this endpoint.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.0
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSchemes(
        /** Limit the results returned to the provided scope, either `team` or `channel`. */
        ?string $scope = '',
        /** The page to select. */
        ?int $page = 0,
        /** The number of schemes per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/schemes';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['scope'] = $scope;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Create a scheme
     * Create a new scheme.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.0
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createScheme(\CreateSchemeRequest $requestBody): array
    {
        $path = '/api/v4/schemes';
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
     * Get a scheme
     * Get a scheme from the provided scheme id.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.0
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getScheme(
        /** Scheme GUID */
        string $scheme_id,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['scheme_id'] = $scheme_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Delete a scheme
     * Soft deletes a scheme, by marking the scheme as deleted in the database.
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * __Minimum server version__: 5.0
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteScheme(
        /** ID of the scheme to delete */
        string $scheme_id,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['scheme_id'] = $scheme_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Patch a scheme
     * Partially update a scheme by providing only the fields you want to update. Omitted fields will not be updated. The fields that can be updated are defined in the request body, all other provided fields will be ignored.
     *
     * ##### Permissions
     * `manage_system` permission is required.
     *
     * __Minimum server version__: 5.0
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchScheme(
        /** Scheme GUID */
        string $scheme_id,
        \PatchSchemeRequest $requestBody,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}/patch';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['scheme_id'] = $scheme_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a page of teams which use this scheme.
     * Get a page of teams which use this scheme. The provided Scheme ID should be for a Team-scoped Scheme.
     * Use the query parameters to modify the behaviour of this endpoint.
     *
     * ##### Permissions
     * `manage_system` permission is required.
     *
     * __Minimum server version__: 5.0
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getTeamsForScheme(
        /** Scheme GUID */
        string $scheme_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of teams per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}/teams';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['scheme_id'] = $scheme_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a page of channels which use this scheme.
     * Get a page of channels which use this scheme. The provided Scheme ID should be for a Channel-scoped Scheme.
     * Use the query parameters to modify the behaviour of this endpoint.
     *
     * ##### Permissions
     * `manage_system` permission is required.
     *
     * __Minimum server version__: 5.0
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getChannelsForScheme(
        /** Scheme GUID */
        string $scheme_id,
        /** The page to select. */
        ?int $page = 0,
        /** The number of channels per page. */
        ?int $per_page = 60,
    ): array
    {
        $path = '/api/v4/schemes/{scheme_id}/channels';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['scheme_id'] = $scheme_id;
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
