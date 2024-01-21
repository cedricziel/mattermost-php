<?php

namespace CedricZiel\MattermostPhp\Client;

class SAMLEndpoint
{
    public function __construct(
        protected string $baseUrl,
        protected \Psr\Http\Client\ClientInterface $httpClient,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Get metadata
     */
    public function getSamlMetadata(): array
    {
        $path = '/api/v4/saml/metadata';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get metadata from Identity Provider
     */
    public function getSamlMetadataFromIdp(): array
    {
        $path = '/api/v4/saml/metadatafromidp';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Upload IDP certificate
     */
    public function uploadSamlIdpCertificate(): array
    {
        $path = '/api/v4/saml/certificate/idp';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Remove IDP certificate
     */
    public function deleteSamlIdpCertificate(): array
    {
        $path = '/api/v4/saml/certificate/idp';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Upload public certificate
     */
    public function uploadSamlPublicCertificate(): array
    {
        $path = '/api/v4/saml/certificate/public';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Remove public certificate
     */
    public function deleteSamlPublicCertificate(): array
    {
        $path = '/api/v4/saml/certificate/public';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Upload private key
     */
    public function uploadSamlPrivateCertificate(): array
    {
        $path = '/api/v4/saml/certificate/private';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Remove private key
     */
    public function deleteSamlPrivateCertificate(): array
    {
        $path = '/api/v4/saml/certificate/private';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get certificate status
     */
    public function getSamlCertificateStatus(): array
    {
        $path = '/api/v4/saml/certificate/status';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Reset AuthData to Email
     */
    public function resetSamlAuthDataToEmail(): array
    {
        $path = '/api/v4/saml/reset_auth_data';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;