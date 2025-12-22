<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\JobsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreateJobRequest;
use CedricZiel\MattermostPhp\Client\Model\Job;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\UpdateJobStatusRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(JobsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Job::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
class JobsEndpointTest extends ClientTestCase
{
    public JobsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new JobsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getJobsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'type' => 'test-type', 'create_at' => 1234567890, 'start_at' => 1234567890, 'last_activity_at' => 1234567890, 'status' => 'test-status', 'progress' => 1234567890]]);

        $page = 1;
        $per_page = 1;
        $job_type = 'test-job_type';
        $status = 'test-status';

        $result = $this->endpoint->getJobs($page, $per_page, $job_type, $status);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/jobs');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'job_type' => 'test-job_type', 'status' => 'test-status']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Job::class, $result[0]);
    }

    #[Test]
    public function createJobBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'type' => 'test-type', 'create_at' => 1234567890, 'start_at' => 1234567890, 'last_activity_at' => 1234567890, 'status' => 'test-status', 'progress' => 1234567890]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateJobRequest(type: 'test-type');

        $result = $this->endpoint->createJob($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/jobs');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Job::class, $result);
    }

    #[Test]
    public function getJobBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'type' => 'test-type', 'create_at' => 1234567890, 'start_at' => 1234567890, 'last_activity_at' => 1234567890, 'status' => 'test-status', 'progress' => 1234567890]);

        $job_id = 'test-job_id';

        $result = $this->endpoint->getJob($job_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/jobs/test-job_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Job::class, $result);
    }

    #[Test]
    public function cancelJobBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $job_id = 'test-job_id';

        $result = $this->endpoint->cancelJob($job_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/jobs/test-job_id/cancel');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getJobsByTypeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'type' => 'test-type', 'create_at' => 1234567890, 'start_at' => 1234567890, 'last_activity_at' => 1234567890, 'status' => 'test-status', 'progress' => 1234567890]]);

        $type = 'test-type';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getJobsByType($type, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/jobs/type/test-type');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Job::class, $result[0]);
    }

    #[Test]
    public function updateJobStatusBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $job_id = 'test-job_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateJobStatusRequest(status: 'test-status');

        $result = $this->endpoint->updateJobStatus($job_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PATCH');
        $this->assertRequestPath('/api/v4/jobs/test-job_id/status');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
