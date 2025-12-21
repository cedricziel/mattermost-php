<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\AgentsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\AgentsResponse;
use CedricZiel\MattermostPhp\Client\Model\ServicesResponse;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(AgentsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(AgentsResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ServicesResponse::class)]
class AgentsEndpointTest extends ClientTestCase
{
    public AgentsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new AgentsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getAgentsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['agents' => []]);

        $result = $this->endpoint->getAgents();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/agents');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\AgentsResponse::class, $result);
    }

    #[Test]
    public function getLLMServicesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['services' => []]);

        $result = $this->endpoint->getLLMServices();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/llmservices');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ServicesResponse::class, $result);
    }
}
