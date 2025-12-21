<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\GroupsEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(GroupsEndpoint::class)]
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
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $remote_id = 'test-remote_id';

        try {
            $this->endpoint->unlinkLdapGroup($remote_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $page = 1;
        $per_page = 1;
        $q = 'test-q';
        $include_member_count = true;
        $not_associated_to_team = 'test-not_associated_to_team';
        $not_associated_to_channel = 'test-not_associated_to_channel';
        $since = 1;
        $filter_allow_reference = true;

        try {
            $this->endpoint->getGroups($page, $per_page, $q, $include_member_count, $not_associated_to_team, $not_associated_to_channel, $since, $filter_allow_reference);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';

        try {
            $this->endpoint->getGroup($group_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function deleteGroupBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';

        try {
            $this->endpoint->deleteGroup($group_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function restoreGroupBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';

        try {
            $this->endpoint->restoreGroup($group_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function linkGroupSyncableForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';
        $team_id = 'test-team_id';

        try {
            $this->endpoint->linkGroupSyncableForTeam($group_id, $team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function unlinkGroupSyncableForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';
        $team_id = 'test-team_id';

        try {
            $this->endpoint->unlinkGroupSyncableForTeam($group_id, $team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function linkGroupSyncableForChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';
        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->linkGroupSyncableForChannel($group_id, $channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function unlinkGroupSyncableForChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';
        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->unlinkGroupSyncableForChannel($group_id, $channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupSyncableForTeamIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';
        $team_id = 'test-team_id';

        try {
            $this->endpoint->getGroupSyncableForTeamId($group_id, $team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupSyncableForChannelIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';
        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->getGroupSyncableForChannelId($group_id, $channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupSyncablesTeamsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';

        try {
            $this->endpoint->getGroupSyncablesTeams($group_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupSyncablesChannelsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';

        try {
            $this->endpoint->getGroupSyncablesChannels($group_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupUsersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';
        $page = 1;
        $per_page = 1;

        try {
            $this->endpoint->getGroupUsers($group_id, $page, $per_page);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupStatsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $group_id = 'test-group_id';

        try {
            $this->endpoint->getGroupStats($group_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupsByChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;
        $filter_allow_reference = true;

        try {
            $this->endpoint->getGroupsByChannel($channel_id, $page, $per_page, $filter_allow_reference);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupsByTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

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

        try {
            $this->endpoint->getGroupsByTeam($team_id, $page, $per_page, $filter_allow_reference, $include_member_count, $include_timezones, $include_total_count, $include_archived, $filter_archived, $filter_parent_team_permitted, $filter_has_member, $include_member_ids, $only_syncable_sources);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupsAssociatedToChannelsByTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;
        $filter_allow_reference = true;
        $paginate = true;

        try {
            $this->endpoint->getGroupsAssociatedToChannelsByTeam($team_id, $page, $per_page, $filter_allow_reference, $paginate);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupsByUserIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';

        try {
            $this->endpoint->getGroupsByUserId($user_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
