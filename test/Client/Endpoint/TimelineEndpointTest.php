<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\TimelineEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(TimelineEndpoint::class)]
class TimelineEndpointTest extends ClientTestCase
{
    public TimelineEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new TimelineEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function removeTimelineEventBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(204);

        $id = 'test-id';
        $event_id = 'test-event_id';

        $this->endpoint->removeTimelineEvent($id, $event_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/timeline/test-event_id');
        $this->assertRequestHasAuthHeader();
    }
}
