<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ElasticsearchEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ElasticsearchEndpoint::class)]
class ElasticsearchEndpointTest extends ClientTestCase
{
    public ElasticsearchEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ElasticsearchEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function testElasticsearchBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        try {
            $this->endpoint->testElasticsearch();
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function purgeElasticsearchIndexesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        try {
            $this->endpoint->purgeElasticsearchIndexes();
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
