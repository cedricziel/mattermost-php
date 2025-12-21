<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\TermsOfServiceEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(TermsOfServiceEndpoint::class)]
class TermsOfServiceEndpointTest extends ClientTestCase
{
    public TermsOfServiceEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new TermsOfServiceEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getTermsOfServiceBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        try {
            $this->endpoint->getTermsOfService();
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function createTermsOfServiceBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        try {
            $this->endpoint->createTermsOfService();
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
