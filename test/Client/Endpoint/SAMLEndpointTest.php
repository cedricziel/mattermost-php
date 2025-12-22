<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\SAMLEndpoint;
use CedricZiel\MattermostPhp\Client\Model\SamlCertificateStatus;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(SAMLEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(SamlCertificateStatus::class)]
class SAMLEndpointTest extends ClientTestCase
{
    public SAMLEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new SAMLEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getSamlMetadataBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, 'test-response-value');

        $result = $this->endpoint->getSamlMetadata();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/saml/metadata');
        $this->assertRequestHasAuthHeader();
        $this->assertIsString($result);
    }

    #[Test]
    public function uploadSamlIdpCertificateBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $certificate = 'test-file-content';

        $result = $this->endpoint->uploadSamlIdpCertificate($certificate);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/saml/certificate/idp');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestContentTypeMultipart();
        $this->assertRequestBodyHasMultipartFile('certificate');
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function deleteSamlIdpCertificateBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->deleteSamlIdpCertificate();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/saml/certificate/idp');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function uploadSamlPublicCertificateBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $certificate = 'test-file-content';

        $result = $this->endpoint->uploadSamlPublicCertificate($certificate);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/saml/certificate/public');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestContentTypeMultipart();
        $this->assertRequestBodyHasMultipartFile('certificate');
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function deleteSamlPublicCertificateBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->deleteSamlPublicCertificate();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/saml/certificate/public');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function uploadSamlPrivateCertificateBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $certificate = 'test-file-content';

        $result = $this->endpoint->uploadSamlPrivateCertificate($certificate);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/saml/certificate/private');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestContentTypeMultipart();
        $this->assertRequestBodyHasMultipartFile('certificate');
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function deleteSamlPrivateCertificateBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->deleteSamlPrivateCertificate();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/saml/certificate/private');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getSamlCertificateStatusBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['idp_certificate_file' => true, 'public_certificate_file' => true, 'private_key_file' => true]);

        $result = $this->endpoint->getSamlCertificateStatus();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/saml/certificate/status');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SamlCertificateStatus::class, $result);
    }
}
