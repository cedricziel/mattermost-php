<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PlaybookRunsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\ChangeOwnerRequest;
use CedricZiel\MattermostPhp\Client\Model\CreatePlaybookRunFromPostRequest;
use CedricZiel\MattermostPhp\Client\Model\OwnerInfo;
use CedricZiel\MattermostPhp\Client\Model\PlaybookRun;
use CedricZiel\MattermostPhp\Client\Model\PlaybookRunList;
use CedricZiel\MattermostPhp\Client\Model\PlaybookRunMetadata;
use CedricZiel\MattermostPhp\Client\Model\PropertyField;
use CedricZiel\MattermostPhp\Client\Model\PropertyValue;
use CedricZiel\MattermostPhp\Client\Model\StatusRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PlaybookRunsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PlaybookRunList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PlaybookRun::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(OwnerInfo::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PlaybookRunMetadata::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PropertyField::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PropertyValue::class)]
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
        $this->assertRequestQueryParams(['team_id' => 'test-team_id', 'page' => '1', 'per_page' => '1', 'sort' => 'test-sort', 'direction' => 'test-direction', 'owner_user_id' => 'test-owner_user_id', 'participant_id' => 'test-participant_id', 'search_term' => 'test-search_term', 'channel_id' => 'test-channel_id', 'omit_ended' => '1', 'since' => '1']);
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
        $this->mockJsonResponse(200, [['user_id' => 'test-user_id', 'username' => 'test-username']]);

        $team_id = 'test-team_id';

        $result = $this->endpoint->getOwners($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/owners');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['team_id' => 'test-team_id']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OwnerInfo::class, $result[0]);
    }

    #[Test]
    public function getChannelsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['item1', 'item2', 'item3']);

        $team_id = 'test-team_id';
        $sort = 'test-sort';
        $direction = 'test-direction';
        $status = 'test-status';
        $owner_user_id = 'test-owner_user_id';
        $search_term = 'test-search_term';
        $participant_id = 'test-participant_id';

        $result = $this->endpoint->getChannels($team_id, $sort, $direction, $status, $owner_user_id, $search_term, $participant_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['team_id' => 'test-team_id', 'sort' => 'test-sort', 'direction' => 'test-direction', 'status' => 'test-status', 'owner_user_id' => 'test-owner_user_id', 'search_term' => 'test-search_term', 'participant_id' => 'test-participant_id']);
        $this->assertIsArray($result);
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
    public function endPlaybookRunBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $id = 'test-id';

        $this->endpoint->endPlaybookRun($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/end');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function restartPlaybookRunBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $id = 'test-id';

        $this->endpoint->restartPlaybookRun($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/restart');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function statusBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $id = 'test-id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\StatusRequest(message: 'test-message');

        $this->endpoint->status($id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/status');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function finishBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $id = 'test-id';

        $this->endpoint->finish($id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/finish');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function changeOwnerBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $id = 'test-id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\ChangeOwnerRequest(owner_id: 'test-owner_id');

        $this->endpoint->changeOwner($id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/owner');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getRunPropertyFieldsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'type' => 'test-type', 'name' => 'test-name', 'description' => 'test-description', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]]);

        $id = 'test-id';
        $updated_since = 1;

        $result = $this->endpoint->getRunPropertyFields($id, $updated_since);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/property_fields');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['updated_since' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PropertyField::class, $result[0]);
    }

    #[Test]
    public function getRunPropertyValuesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'field_id' => 'test-field_id', 'value' => 'test-value', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]]);

        $id = 'test-id';
        $updated_since = 1;

        $result = $this->endpoint->getRunPropertyValues($id, $updated_since);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/plugins/playbooks/api/v0/runs/test-id/property_values');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['updated_since' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PropertyValue::class, $result[0]);
    }
}
