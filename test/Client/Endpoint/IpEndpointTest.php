<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\IpEndpoint;
use CedricZiel\MattermostPhp\Client\Model\AllowedIPRange;
use CedricZiel\MattermostPhp\Client\Model\ApplyIPFiltersRequest;
use CedricZiel\MattermostPhp\Client\Model\MyIPResponse;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(IpEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(AllowedIPRange::class)]
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
        $this->mockJsonResponse(200, [['CIDRBlock' => 'test-CIDRBlock', 'Description' => 'test-Description']]);

        $result = $this->endpoint->getIPFilters();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/ip_filtering');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\AllowedIPRange::class, $result[0]);
    }

    #[Test]
    public function applyIPFiltersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['CIDRBlock' => 'test-CIDRBlock', 'Description' => 'test-Description']]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\ApplyIPFiltersRequest(items: []);

        $result = $this->endpoint->applyIPFilters($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/ip_filtering');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\AllowedIPRange::class, $result[0]);
    }

    #[Test]
    public function myIPBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['ip' => 'test-ip']);

        $result = $this->endpoint->myIP();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/ip_filtering/my_ip');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\MyIPResponse::class, $result);
    }
}
