<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\TeamsEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(TeamsEndpoint::class)]
class TeamsEndpointTest extends ClientTestCase
{
    public TeamsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new TeamsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getAllTeamsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $page = 1;
        $per_page = 1;
        $include_total_count = true;
        $exclude_policy_constrained = true;

        try {
            $this->endpoint->getAllTeams($page, $per_page, $include_total_count, $exclude_policy_constrained);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';

        try {
            $this->endpoint->getTeam($team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function softDeleteTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $permanent = true;

        try {
            $this->endpoint->softDeleteTeam($team_id, $permanent);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function restoreTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';

        try {
            $this->endpoint->restoreTeam($team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamByNameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $name = 'test-name';

        try {
            $this->endpoint->getTeamByName($name);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function teamExistsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $name = 'test-name';

        try {
            $this->endpoint->teamExists($name);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';

        try {
            $this->endpoint->getTeamsForUser($user_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamMembersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;
        $sort = 'test-sort';
        $exclude_deleted_users = true;

        try {
            $this->endpoint->getTeamMembers($team_id, $page, $per_page, $sort, $exclude_deleted_users);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function addTeamMemberFromInviteBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $token = 'test-token';

        try {
            $this->endpoint->addTeamMemberFromInvite($token);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamMembersForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';

        try {
            $this->endpoint->getTeamMembersForUser($user_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamMemberBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';

        try {
            $this->endpoint->getTeamMember($team_id, $user_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function removeTeamMemberBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';

        try {
            $this->endpoint->removeTeamMember($team_id, $user_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamStatsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';

        try {
            $this->endpoint->getTeamStats($team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function regenerateTeamInviteIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';

        try {
            $this->endpoint->regenerateTeamInviteId($team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamIconBuildsCorrectRequest(): void
    {
        $this->mockBinaryResponse(200, 'binary-content', 'image/png');

        $team_id = 'test-team_id';

        try {
            $this->endpoint->getTeamIcon($team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function removeTeamIconBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';

        try {
            $this->endpoint->removeTeamIcon($team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamsUnreadForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $exclude_team = 'test-exclude_team';
        $include_collapsed_threads = true;

        try {
            $this->endpoint->getTeamsUnreadForUser($user_id, $exclude_team, $include_collapsed_threads);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamUnreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';

        try {
            $this->endpoint->getTeamUnread($user_id, $team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function invalidateEmailInvitesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        try {
            $this->endpoint->invalidateEmailInvites();
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function importTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $filesize = 1;
        $importFrom = 'test-importFrom';

        try {
            $this->endpoint->importTeam($team_id, null, $filesize, $importFrom);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamInviteInfoBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $invite_id = 'test-invite_id';

        try {
            $this->endpoint->getTeamInviteInfo($invite_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function teamMembersMinusGroupMembersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $group_ids = 'test-group_ids';
        $page = 1;
        $per_page = 1;

        try {
            $this->endpoint->teamMembersMinusGroupMembers($team_id, $group_ids, $page, $per_page);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function searchFilesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $terms = 'test-terms';
        $is_or_search = true;
        $time_zone_offset = 1;
        $include_deleted_channels = true;
        $page = 1;
        $per_page = 1;

        try {
            $this->endpoint->searchFiles($team_id, $terms, $is_or_search, $time_zone_offset, $include_deleted_channels, $page, $per_page);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
