<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\BleveEndpoint;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(BleveEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
class BleveEndpointTest extends ClientTestCase
{
    public BleveEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new BleveEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function purgeBleveIndexesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->purgeBleveIndexes();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/bleve/purge_indexes');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
