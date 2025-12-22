<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PermissionsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\GetAncillaryPermissionsPostRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PermissionsEndpoint::class)]
class PermissionsEndpointTest extends ClientTestCase
{
    public PermissionsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new PermissionsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getAncillaryPermissionsPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['item1', 'item2', 'item3']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetAncillaryPermissionsPostRequest(items: []);

        $result = $this->endpoint->getAncillaryPermissionsPost($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/permissions/ancillary');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
    }
}
