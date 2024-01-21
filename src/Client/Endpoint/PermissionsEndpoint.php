<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class PermissionsEndpoint
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
     * Return all system console subsection ancillary permissions
     * Returns all the ancillary permissions for the corresponding system console subsection permissions appended to the requested permission subsections.
     *
     * __Minimum server version__: 5.35
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getAncillaryPermissions(
        /**
         * The subsection permissions to return the ancillary permissions for. These values are comma seperated. Ex. subsection_permissions=sysconsole_read_reporting_site_statistics,sysconsole_write_reporting_site_statistics,sysconsole_write_user_management_channels
         */
        ?string $subsection_permissions,
    ): array
    {
        $path = '/api/v4/permissions/ancillary';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['subsection_permissions'] = $subsection_permissions;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
