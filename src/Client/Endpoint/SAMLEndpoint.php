<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class SAMLEndpoint
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
     * Get metadata
     * Get SAML metadata from the server. SAML must be configured properly.
     * ##### Permissions
     * No permission required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSamlMetadata(): array
    {
        $path = '/api/v4/saml/metadata';
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
     * Get metadata from Identity Provider
     * Get SAML metadata from the Identity Provider. SAML must be configured properly.
     * ##### Permissions
     * No permission required.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSamlMetadataFromIdp(\GetSamlMetadataFromIdpRequest $requestBody): array
    {
        $path = '/api/v4/saml/metadatafromidp';
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
     * Upload IDP certificate
     * Upload the IDP certificate to be used with your SAML configuration. The server will pick a hard-coded filename for the IdpCertificateFile setting in your `config.json`.
     * ##### Permissions
     * Must have `sysconsole_write_authentication` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function uploadSamlIdpCertificate(): array
    {
        $path = '/api/v4/saml/certificate/idp';
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
     * Remove IDP certificate
     * Delete the current IDP certificate being used with your SAML configuration. This will also disable SAML on your system as this certificate is required for SAML.
     * ##### Permissions
     * Must have `sysconsole_write_authentication` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteSamlIdpCertificate(): array
    {
        $path = '/api/v4/saml/certificate/idp';
        $method = 'delete';
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
     * Upload public certificate
     * Upload the public certificate to be used for encryption with your SAML configuration. The server will pick a hard-coded filename for the PublicCertificateFile setting in your `config.json`.
     * ##### Permissions
     * Must have `sysconsole_write_authentication` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function uploadSamlPublicCertificate(): array
    {
        $path = '/api/v4/saml/certificate/public';
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
     * Remove public certificate
     * Delete the current public certificate being used with your SAML configuration. This will also disable encryption for SAML on your system as this certificate is required for that.
     * ##### Permissions
     * Must have `sysconsole_write_authentication` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteSamlPublicCertificate(): array
    {
        $path = '/api/v4/saml/certificate/public';
        $method = 'delete';
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
     * Upload private key
     * Upload the private key to be used for encryption with your SAML configuration. The server will pick a hard-coded filename for the PrivateKeyFile setting in your `config.json`.
     * ##### Permissions
     * Must have `sysconsole_write_authentication` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function uploadSamlPrivateCertificate(): array
    {
        $path = '/api/v4/saml/certificate/private';
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
     * Remove private key
     * Delete the current private key being used with your SAML configuration. This will also disable encryption for SAML on your system as this key is required for that.
     * ##### Permissions
     * Must have `sysconsole_write_authentication` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteSamlPrivateCertificate(): array
    {
        $path = '/api/v4/saml/certificate/private';
        $method = 'delete';
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
     * Get certificate status
     * Get the status of the uploaded certificates and keys in use by your SAML configuration.
     * ##### Permissions
     * Must have `sysconsole_write_authentication` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getSamlCertificateStatus(): array
    {
        $path = '/api/v4/saml/certificate/status';
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
     * Reset AuthData to Email
     * Reset the AuthData field of SAML users to their email. This is meant to be used when the "id" attribute is set to an empty value ("") from a previously non-empty value.
     * __Minimum server version__: 5.35
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function resetSamlAuthDataToEmail(\ResetSamlAuthDataToEmailRequest $requestBody): array
    {
        $path = '/api/v4/saml/reset_auth_data';
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
