<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class Audit_logsEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;
    use \CedricZiel\MattermostPhp\Client\MultipartTrait;

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
     * Upload audit log certificate
     * Upload the certificate to be used for TLS verification with the audit log service.
     *
     * ##### Permissions
     * Must have `sysconsole_write_experimental_features` permission.
     *
     * __Minimum server version__: 10.9
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function addAuditLogCertificate(
        /** The certificate file (string|resource|\Psr\Http\Message\StreamInterface) */
        mixed $certificate,
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultTooLargeResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/audit_logs/certificate', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('POST', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        // Build multipart form data
        $multipartFields = [];
        if ($certificate !== null) {
            $multipartFields['certificate'] = ['contents' => $certificate, 'filename' => 'certificate'];
        }

        $multipart = $this->createMultipartStream($multipartFields);
        $request = $request->withHeader('Content-Type', 'multipart/form-data; boundary=' . $multipart['boundary']);
        $request = $request->withBody($multipart['stream']);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[413] = \CedricZiel\MattermostPhp\Client\Model\DefaultTooLargeResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Remove audit log certificate
     * Delete the current certificate being used with the audit log service.
     *
     * ##### Permissions
     * Must have `sysconsole_write_experimental_features` permission.
     *
     * __Minimum server version__: 9.5
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function removeAuditLogCertificate(
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse {
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri('/api/v4/audit_logs/certificate', $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest('DELETE', $uri);
        $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }
}
