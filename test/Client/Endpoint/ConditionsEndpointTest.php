<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ConditionsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\ConditionList;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ConditionsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ConditionList::class)]
class ConditionsEndpointTest extends ClientTestCase
{
    public ConditionsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ConditionsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getPlaybookConditionsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_count' => 1234567890, 'page_count' => 1234567890, 'has_more' => true, 'items' => []]);

        $id = 'test-id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getPlaybookConditions($id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks/test-id/conditions');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ConditionList::class, $result);
    }

    #[Test]
    public function deletePlaybookConditionBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(204);

        $id = 'test-id';
        $conditionID = 'test-conditionID';

        $this->endpoint->deletePlaybookCondition($id, $conditionID);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks/test-id/conditions/test-conditionID');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getRunConditionsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_count' => 1234567890, 'page_count' => 1234567890, 'has_more' => true, 'items' => []]);

        $id = 'test-id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getRunConditions($id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/conditions');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ConditionList::class, $result);
    }
}
