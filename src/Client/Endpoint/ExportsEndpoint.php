<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class ExportsEndpoint
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
     * List export files
     * Lists all available export files.
     * __Minimum server version__: 5.33
     * ##### Permissions
     * Must have `manage_system` permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function listExports(): array
    {
        $path = '/api/v4/exports';
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
     * Download an export file
     * Downloads an export file.
     *
     *
     * __Minimum server version__: 5.33
     *
     * ##### Permissions
     *
     * Must have `manage_system` permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function downloadExport(
        /** The name of the export file to download */
        string $export_name,
    ): array
    {
        $path = '/api/v4/exports/{export_name}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['export_name'] = $export_name;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Delete an export file
     * Deletes an export file.
     *
     *
     * __Minimum server version__: 5.33
     *
     * ##### Permissions
     *
     * Must have `manage_system` permissions.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteExport(
        /** The name of the export file to delete */
        string $export_name,
    ): array
    {
        $path = '/api/v4/exports/{export_name}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['export_name'] = $export_name;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
