<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ElasticsearchEndpoint;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ElasticsearchEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
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
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->testElasticsearch();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/elasticsearch/test');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function purgeElasticsearchIndexesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->purgeElasticsearchIndexes();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/elasticsearch/purge_indexes');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
