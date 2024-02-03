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
        ?string $subsection_permissions = null,
    ): \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse
    {
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['subsection_permissions'] = $subsection_permissions;

        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/permissions/ancillary', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('GET', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;

        return $this->mapResponse($response, $map);
    }
}
