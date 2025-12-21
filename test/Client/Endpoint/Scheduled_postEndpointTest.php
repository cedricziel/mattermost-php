<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\Scheduled_postEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreateScheduledPostRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateScheduledPostRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(Scheduled_postEndpoint::class)]
class Scheduled_postEndpointTest extends ClientTestCase
{
    public Scheduled_postEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new Scheduled_postEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function endpointCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Scheduled_postEndpoint::class, $this->endpoint);
    }
}
