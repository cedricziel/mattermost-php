<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\GroupsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\GetGroupStatsResponse;
use CedricZiel\MattermostPhp\Client\Model\GetGroupUsersResponse;
use CedricZiel\MattermostPhp\Client\Model\Group;
use CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannel;
use CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeam;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(GroupsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Group::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GroupSyncableTeam::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GroupSyncableChannel::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetGroupUsersResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetGroupStatsResponse::class)]
class GroupsEndpointTest extends ClientTestCase
{
    public GroupsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new GroupsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function unlinkLdapGroupBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $remote_id = 'test-remote_id';

        $result = $this->endpoint->unlinkLdapGroup($remote_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getGroupsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $page = 1;
        $per_page = 1;
        $q = 'test-q';
        $include_member_count = true;
        $not_associated_to_team = 'test-not_associated_to_team';
        $not_associated_to_channel = 'test-not_associated_to_channel';
        $since = 1;
        $filter_allow_reference = true;

        $result = $this->endpoint->getGroups($page, $per_page, $q, $include_member_count, $not_associated_to_team, $not_associated_to_channel, $since, $filter_allow_reference);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'description' => 'test-description', 'source' => 'test-source', 'remote_id' => 'test-remote_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'has_syncables' => true]);

        $group_id = 'test-group_id';

        $result = $this->endpoint->getGroup($group_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Group::class, $result);
    }

    #[Test]
    public function deleteGroupBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $group_id = 'test-group_id';

        $result = $this->endpoint->deleteGroup($group_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function restoreGroupBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $group_id = 'test-group_id';

        $result = $this->endpoint->restoreGroup($group_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function unlinkGroupSyncableForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $group_id = 'test-group_id';
        $team_id = 'test-team_id';

        $result = $this->endpoint->unlinkGroupSyncableForTeam($group_id, $team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function unlinkGroupSyncableForChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $group_id = 'test-group_id';
        $channel_id = 'test-channel_id';

        $result = $this->endpoint->unlinkGroupSyncableForChannel($group_id, $channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getGroupSyncableForTeamIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['team_id' => 'test-team_id', 'group_id' => 'test-group_id', 'auto_add' => true, 'create_at' => 1234567890, 'delete_at' => 1234567890, 'update_at' => 1234567890]);

        $group_id = 'test-group_id';
        $team_id = 'test-team_id';

        $result = $this->endpoint->getGroupSyncableForTeamId($group_id, $team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GroupSyncableTeam::class, $result);
    }

    #[Test]
    public function getGroupSyncableForChannelIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['channel_id' => 'test-channel_id', 'group_id' => 'test-group_id', 'auto_add' => true, 'create_at' => 1234567890, 'delete_at' => 1234567890, 'update_at' => 1234567890]);

        $group_id = 'test-group_id';
        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getGroupSyncableForChannelId($group_id, $channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GroupSyncableChannel::class, $result);
    }

    #[Test]
    public function getGroupSyncablesTeamsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $group_id = 'test-group_id';

        $result = $this->endpoint->getGroupSyncablesTeams($group_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupSyncablesChannelsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $group_id = 'test-group_id';

        $result = $this->endpoint->getGroupSyncablesChannels($group_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupUsersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['members' => [], 'total_member_count' => 1234567890]);

        $group_id = 'test-group_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getGroupUsers($group_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetGroupUsersResponse::class, $result);
    }

    #[Test]
    public function getGroupStatsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['group_id' => 'test-group_id', 'total_member_count' => 1234567890]);

        $group_id = 'test-group_id';

        $result = $this->endpoint->getGroupStats($group_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetGroupStatsResponse::class, $result);
    }

    #[Test]
    public function getGroupsByChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;
        $filter_allow_reference = true;

        $result = $this->endpoint->getGroupsByChannel($channel_id, $page, $per_page, $filter_allow_reference);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupsByTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;
        $filter_allow_reference = true;
        $include_member_count = true;
        $include_timezones = true;
        $include_total_count = true;
        $include_archived = true;
        $filter_archived = true;
        $filter_parent_team_permitted = true;
        $filter_has_member = 'test-filter_has_member';
        $include_member_ids = true;
        $only_syncable_sources = true;

        $result = $this->endpoint->getGroupsByTeam($team_id, $page, $per_page, $filter_allow_reference, $include_member_count, $include_timezones, $include_total_count, $include_archived, $filter_archived, $filter_parent_team_permitted, $filter_has_member, $include_member_ids, $only_syncable_sources);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupsByUserIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getGroupsByUserId($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
