<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ComplianceEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Compliance;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ComplianceEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Compliance::class)]
class ComplianceEndpointTest extends ClientTestCase
{
    public ComplianceEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ComplianceEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function createComplianceReportBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'user_id' => 'test-user_id', 'status' => 'test-status', 'count' => 1234567890, 'desc' => 'test-desc', 'type' => 'test-type', 'start_at' => 1234567890, 'end_at' => 1234567890, 'keywords' => 'test-keywords', 'emails' => 'test-emails']);

        $result = $this->endpoint->createComplianceReport();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/compliance/reports');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Compliance::class, $result);
    }

    #[Test]
    public function getComplianceReportsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'user_id' => 'test-user_id', 'status' => 'test-status', 'count' => 1234567890, 'desc' => 'test-desc', 'type' => 'test-type', 'start_at' => 1234567890, 'end_at' => 1234567890, 'keywords' => 'test-keywords', 'emails' => 'test-emails']]);

        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getComplianceReports($page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/compliance/reports');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Compliance::class, $result[0]);
    }

    #[Test]
    public function getComplianceReportBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'user_id' => 'test-user_id', 'status' => 'test-status', 'count' => 1234567890, 'desc' => 'test-desc', 'type' => 'test-type', 'start_at' => 1234567890, 'end_at' => 1234567890, 'keywords' => 'test-keywords', 'emails' => 'test-emails']);

        $report_id = 'test-report_id';

        $result = $this->endpoint->getComplianceReport($report_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/compliance/reports/test-report_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Compliance::class, $result);
    }
}
