<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class PermissionsEndpoint
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
    ): \CedricZiel\MattermostPhp\Client\Model\GetAncillaryPermissionsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse
    {
        $path = '/api/v4/permissions/ancillary';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['subsection_permissions'] = $subsection_permissions;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetAncillaryPermissionsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;

        return $this->mapResponse($response, $map);
    }
}
