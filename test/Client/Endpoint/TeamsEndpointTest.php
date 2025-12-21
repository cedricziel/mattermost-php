<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\TeamsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\FileInfoList;
use CedricZiel\MattermostPhp\Client\Model\GetTeamInviteInfoResponse;
use CedricZiel\MattermostPhp\Client\Model\ImportTeamResponse;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\Team;
use CedricZiel\MattermostPhp\Client\Model\TeamExists;
use CedricZiel\MattermostPhp\Client\Model\TeamMember;
use CedricZiel\MattermostPhp\Client\Model\TeamStats;
use CedricZiel\MattermostPhp\Client\Model\TeamUnread;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(TeamsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Team::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(TeamExists::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(TeamMember::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(TeamStats::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(TeamUnread::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ImportTeamResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetTeamInviteInfoResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(FileInfoList::class)]
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
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $page = 1;
        $per_page = 1;
        $include_total_count = true;
        $exclude_policy_constrained = true;

        $result = $this->endpoint->getAllTeams($page, $per_page, $include_total_count, $exclude_policy_constrained);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']);

        $team_id = 'test-team_id';

        $result = $this->endpoint->getTeam($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result);
    }

    #[Test]
    public function softDeleteTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $team_id = 'test-team_id';
        $permanent = true;

        $result = $this->endpoint->softDeleteTeam($team_id, $permanent);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function restoreTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']);

        $team_id = 'test-team_id';

        $result = $this->endpoint->restoreTeam($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result);
    }

    #[Test]
    public function getTeamByNameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']);

        $name = 'test-name';

        $result = $this->endpoint->getTeamByName($name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result);
    }

    #[Test]
    public function teamExistsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['exists' => true]);

        $name = 'test-name';

        $result = $this->endpoint->teamExists($name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamExists::class, $result);
    }

    #[Test]
    public function getTeamsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getTeamsForUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamMembersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;
        $sort = 'test-sort';
        $exclude_deleted_users = true;

        $result = $this->endpoint->getTeamMembers($team_id, $page, $per_page, $sort, $exclude_deleted_users);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamMembersForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getTeamMembersForUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamMemberBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['team_id' => 'test-team_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'delete_at' => 1234567890, 'scheme_user' => true, 'scheme_admin' => true, 'explicit_roles' => 'test-explicit_roles']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';

        $result = $this->endpoint->getTeamMember($team_id, $user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamMember::class, $result);
    }

    #[Test]
    public function removeTeamMemberBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';

        $result = $this->endpoint->removeTeamMember($team_id, $user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getTeamStatsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['team_id' => 'test-team_id', 'total_member_count' => 1234567890]);

        $team_id = 'test-team_id';

        $result = $this->endpoint->getTeamStats($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamStats::class, $result);
    }

    #[Test]
    public function regenerateTeamInviteIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']);

        $team_id = 'test-team_id';

        $result = $this->endpoint->regenerateTeamInviteId($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result);
    }

    #[Test]
    public function removeTeamIconBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $team_id = 'test-team_id';

        $result = $this->endpoint->removeTeamIcon($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getTeamsUnreadForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';
        $exclude_team = 'test-exclude_team';
        $include_collapsed_threads = true;

        $result = $this->endpoint->getTeamsUnreadForUser($user_id, $exclude_team, $include_collapsed_threads);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getTeamUnreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['team_id' => 'test-team_id', 'msg_count' => 1234567890, 'mention_count' => 1234567890]);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';

        $result = $this->endpoint->getTeamUnread($user_id, $team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamUnread::class, $result);
    }

    #[Test]
    public function invalidateEmailInvitesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->invalidateEmailInvites();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function importTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['results' => 'test-results']);

        $team_id = 'test-team_id';
        $filesize = 1;
        $importFrom = 'test-importFrom';

        $result = $this->endpoint->importTeam($team_id, null, $filesize, $importFrom);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ImportTeamResponse::class, $result);
    }

    #[Test]
    public function getTeamInviteInfoBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'description' => 'test-description']);

        $invite_id = 'test-invite_id';

        $result = $this->endpoint->getTeamInviteInfo($invite_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetTeamInviteInfoResponse::class, $result);
    }

    #[Test]
    public function searchFilesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['order' => [], 'next_file_id' => 'test-next_file_id', 'prev_file_id' => 'test-prev_file_id']);

        $team_id = 'test-team_id';
        $terms = 'test-terms';
        $is_or_search = true;
        $time_zone_offset = 1;
        $include_deleted_channels = true;
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->searchFiles($team_id, $terms, $is_or_search, $time_zone_offset, $include_deleted_channels, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\FileInfoList::class, $result);
    }
}
