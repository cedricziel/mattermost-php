<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ClusterEndpoint;
use CedricZiel\MattermostPhp\Client\Model\ClusterInfo;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ClusterEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ClusterInfo::class)]
class ClusterEndpointTest extends ClientTestCase
{
    public ClusterEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ClusterEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getClusterStatusBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [[]]);

        $result = $this->endpoint->getClusterStatus();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/cluster/status');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ClusterInfo::class, $result[0]);
    }
}
