<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\StatusEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Status;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(StatusEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Status::class)]
class StatusEndpointTest extends ClientTestCase
{
    public StatusEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new StatusEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getUserStatusBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'status' => 'test-status', 'manual' => true, 'last_activity_at' => 1234567890]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUserStatus($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Status::class, $result);
    }
}
