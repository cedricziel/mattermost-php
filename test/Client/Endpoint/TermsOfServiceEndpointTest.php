<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\TermsOfServiceEndpoint;
use CedricZiel\MattermostPhp\Client\Model\TermsOfService;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(TermsOfServiceEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(TermsOfService::class)]
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
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'user_id' => 'test-user_id', 'text' => 'test-text']);

        $result = $this->endpoint->getTermsOfService();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/terms_of_service');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TermsOfService::class, $result);
    }

    #[Test]
    public function createTermsOfServiceBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'user_id' => 'test-user_id', 'text' => 'test-text']);

        $result = $this->endpoint->createTermsOfService();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/terms_of_service');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TermsOfService::class, $result);
    }
}
