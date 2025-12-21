<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\IpEndpoint;
use CedricZiel\MattermostPhp\Client\Model\MyIPResponse;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(IpEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(MyIPResponse::class)]
class IpEndpointTest extends ClientTestCase
{
    public IpEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new IpEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getIPFiltersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $result = $this->endpoint->getIPFilters();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function myIPBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['ip' => 'test-ip']);

        $result = $this->endpoint->myIP();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\MyIPResponse::class, $result);
    }
}
