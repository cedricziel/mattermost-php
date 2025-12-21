<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ContentFlaggingEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ContentFlaggingEndpoint::class)]
class ContentFlaggingEndpointTest extends ClientTestCase
{
    public ContentFlaggingEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ContentFlaggingEndpoint(
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
        $this->assertInstanceOf(ContentFlaggingEndpoint::class, $this->endpoint);
    }
}
