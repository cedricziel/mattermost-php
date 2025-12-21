<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\MetricsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\SubmitPerformanceReportRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(MetricsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
class MetricsEndpointTest extends ClientTestCase
{
    public MetricsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new MetricsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function submitPerformanceReportBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SubmitPerformanceReportRequest(version: 'test-version', start: 1234567890, end: 1234567890);

        $result = $this->endpoint->submitPerformanceReport($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/client_perf');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
