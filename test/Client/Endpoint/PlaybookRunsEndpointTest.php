<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PlaybookRunsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreatePlaybookRunFromPostRequest;
use CedricZiel\MattermostPhp\Client\Model\PlaybookRun;
use CedricZiel\MattermostPhp\Client\Model\PlaybookRunList;
use CedricZiel\MattermostPhp\Client\Model\PlaybookRunMetadata;
use CedricZiel\MattermostPhp\Client\Model\TriggerIdReturn;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PlaybookRunsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PlaybookRunList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PlaybookRun::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PlaybookRunMetadata::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(TriggerIdReturn::class)]
class PlaybookRunsEndpointTest extends ClientTestCase
{
    public PlaybookRunsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new PlaybookRunsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function listPlaybookRunsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_count' => 1234567890, 'page_count' => 1234567890, 'has_more' => true, 'items' => []]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;
        $sort = 'test-sort';
        $direction = 'test-direction';
        $statuses = [];
        $owner_user_id = 'test-owner_user_id';
        $participant_id = 'test-participant_id';
        $search_term = 'test-search_term';
        $channel_id = 'test-channel_id';
        $omit_ended = true;
        $since = 1;

        $result = $this->endpoint->listPlaybookRuns($team_id, $page, $per_page, $sort, $direction, $statuses, $owner_user_id, $participant_id, $search_term, $channel_id, $omit_ended, $since);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['team_id' => 'test-team_id', 'page' => '1', 'per_page' => '1', 'sort' => 'test-sort', 'direction' => 'test-direction', 'owner_user_id' => 'test-owner_user_id', 'participant_id' => 'test-participant_id', 'search_term' => 'test-search_term', 'channel_id' => 'test-channel_id', 'since' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PlaybookRunList::class, $result);
    }

    #[Test]
    public function createPlaybookRunFromPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'name' => 'test-name', 'description' => 'test-description', 'is_active' => true, 'owner_user_id' => 'test-owner_user_id', 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'create_at' => 1234567890, 'end_at' => 1234567890, 'delete_at' => 1234567890, 'active_stage' => 1234567890, 'active_stage_title' => 'test-active_stage_title', 'post_id' => 'test-post_id', 'playbook_id' => 'test-playbook_id', 'checklists' => []]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreatePlaybookRunFromPostRequest(name: 'test-name', owner_user_id: 'test-owner_user_id', team_id: 'test-team_id', playbook_id: 'test-playbook_id');

        $result = $this->endpoint->createPlaybookRunFromPost($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PlaybookRun::class, $result);
    }

    #[Test]
    public function getOwnersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';

        $result = $this->endpoint->getOwners($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/owners');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['team_id' => 'test-team_id']);
    }

    #[Test]
    public function getPlaybookRunByChannelIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'description' => 'test-description', 'is_active' => true, 'owner_user_id' => 'test-owner_user_id', 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'create_at' => 1234567890, 'end_at' => 1234567890, 'delete_at' => 1234567890, 'active_stage' => 1234567890, 'active_stage_title' => 'test-active_stage_title', 'post_id' => 'test-post_id', 'playbook_id' => 'test-playbook_id', 'checklists' => []]);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getPlaybookRunByChannelId($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/channel/test-channel_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PlaybookRun::class, $result);
    }

    #[Test]
    public function getPlaybookRunBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'description' => 'test-description', 'is_active' => true, 'owner_user_id' => 'test-owner_user_id', 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'create_at' => 1234567890, 'end_at' => 1234567890, 'delete_at' => 1234567890, 'active_stage' => 1234567890, 'active_stage_title' => 'test-active_stage_title', 'post_id' => 'test-post_id', 'playbook_id' => 'test-playbook_id', 'checklists' => []]);

        $id = 'test-id';

        $result = $this->endpoint->getPlaybookRun($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PlaybookRun::class, $result);
    }

    #[Test]
    public function getPlaybookRunMetadataBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['channel_name' => 'test-channel_name', 'channel_display_name' => 'test-channel_display_name', 'team_name' => 'test-team_name', 'num_members' => 1234567890, 'total_posts' => 1234567890]);

        $id = 'test-id';

        $result = $this->endpoint->getPlaybookRunMetadata($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/metadata');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PlaybookRunMetadata::class, $result);
    }

    #[Test]
    public function itemRunBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['trigger_id' => 'test-trigger_id']);

        $id = 'test-id';
        $checklist = 1;
        $item = 1;

        $result = $this->endpoint->itemRun($id, $checklist, $item);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/checklists/1/item/1/run');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TriggerIdReturn::class, $result);
    }

    #[Test]
    public function getRunPropertyFieldsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $id = 'test-id';
        $updated_since = 1;

        $result = $this->endpoint->getRunPropertyFields($id, $updated_since);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/property_fields');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['updated_since' => '1']);
    }

    #[Test]
    public function getRunPropertyValuesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $id = 'test-id';
        $updated_since = 1;

        $result = $this->endpoint->getRunPropertyValues($id, $updated_since);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/property_values');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['updated_since' => '1']);
    }
}
