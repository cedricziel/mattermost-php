<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PlaybooksEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreatePlaybookRequest;
use CedricZiel\MattermostPhp\Client\Model\CreatePlaybookResponse;
use CedricZiel\MattermostPhp\Client\Model\Playbook;
use CedricZiel\MattermostPhp\Client\Model\PlaybookList;
use CedricZiel\MattermostPhp\Client\Model\PropertyField;
use CedricZiel\MattermostPhp\Client\Model\ReorderPlaybookPropertyFieldsRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PlaybooksEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PlaybookList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(CreatePlaybookResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Playbook::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PropertyField::class)]
class PlaybooksEndpointTest extends ClientTestCase
{
    public PlaybooksEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new PlaybooksEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getPlaybooksBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_count' => 1234567890, 'page_count' => 1234567890, 'has_more' => true, 'items' => []]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;
        $sort = 'test-sort';
        $direction = 'test-direction';
        $with_archived = true;

        $result = $this->endpoint->getPlaybooks($team_id, $page, $per_page, $sort, $direction, $with_archived);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['team_id' => 'test-team_id', 'page' => '1', 'per_page' => '1', 'sort' => 'test-sort', 'direction' => 'test-direction', 'with_archived' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PlaybookList::class, $result);
    }

    #[Test]
    public function createPlaybookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreatePlaybookRequest(title: 'test-title', team_id: 'test-team_id', create_public_playbook_run: true, checklists: [], member_ids: []);

        $result = $this->endpoint->createPlaybook($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\CreatePlaybookResponse::class, $result);
    }

    #[Test]
    public function getPlaybookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'title' => 'test-title', 'description' => 'test-description', 'team_id' => 'test-team_id', 'create_public_playbook_run' => true, 'create_at' => 1234567890, 'delete_at' => 1234567890, 'num_stages' => 1234567890, 'num_steps' => 1234567890, 'checklists' => [], 'member_ids' => []]);

        $id = 'test-id';

        $result = $this->endpoint->getPlaybook($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks/test-id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Playbook::class, $result);
    }

    #[Test]
    public function deletePlaybookBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(204);

        $id = 'test-id';

        $this->endpoint->deletePlaybook($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks/test-id');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPlaybookPropertyFieldsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'type' => 'test-type', 'name' => 'test-name', 'description' => 'test-description', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]]);

        $id = 'test-id';
        $updated_since = 1;

        $result = $this->endpoint->getPlaybookPropertyFields($id, $updated_since);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks/test-id/property_fields');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['updated_since' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PropertyField::class, $result[0]);
    }

    #[Test]
    public function deletePlaybookPropertyFieldBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(204);

        $id = 'test-id';
        $field_id = 'test-field_id';

        $this->endpoint->deletePlaybookPropertyField($id, $field_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks/test-id/property_fields/test-field_id');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function reorderPlaybookPropertyFieldsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'type' => 'test-type', 'name' => 'test-name', 'description' => 'test-description', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]]);

        $id = 'test-id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\ReorderPlaybookPropertyFieldsRequest(field_id: 'test-field_id', target_position: 1234567890);

        $result = $this->endpoint->reorderPlaybookPropertyFields($id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/plugins/playbooks/api/v0/playbooks/test-id/property_fields/reorder');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PropertyField::class, $result[0]);
    }
}
