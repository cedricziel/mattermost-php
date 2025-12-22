<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\InternalEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(InternalEndpoint::class)]
class InternalEndpointTest extends ClientTestCase
{
    public InternalEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new InternalEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function endPlaybookRunDialogBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $id = 'test-id';

        $this->endpoint->endPlaybookRunDialog($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/end');
        $this->assertRequestHasAuthHeader();
    }
}
