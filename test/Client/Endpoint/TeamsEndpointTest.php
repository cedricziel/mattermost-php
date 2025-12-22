<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\TeamsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\AddTeamMembersRequest;
use CedricZiel\MattermostPhp\Client\Model\CreateTeamRequest;
use CedricZiel\MattermostPhp\Client\Model\FileInfoList;
use CedricZiel\MattermostPhp\Client\Model\GetTeamInviteInfoResponse;
use CedricZiel\MattermostPhp\Client\Model\GetTeamMembersByIdsRequest;
use CedricZiel\MattermostPhp\Client\Model\ImportTeamResponse;
use CedricZiel\MattermostPhp\Client\Model\InviteGuestsToTeamRequest;
use CedricZiel\MattermostPhp\Client\Model\InviteUsersToTeamRequest;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\Team;
use CedricZiel\MattermostPhp\Client\Model\TeamExists;
use CedricZiel\MattermostPhp\Client\Model\TeamMember;
use CedricZiel\MattermostPhp\Client\Model\TeamStats;
use CedricZiel\MattermostPhp\Client\Model\TeamUnread;
use CedricZiel\MattermostPhp\Client\Model\UpdateTeamMemberRolesRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateTeamMemberSchemeRolesRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateTeamPrivacyRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateTeamRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateTeamSchemeRequest;
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
    public function createTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateTeamRequest(name: 'test-name', display_name: 'test-display_name', type: 'test-type');

        $result = $this->endpoint->createTeam($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result);
    }

    #[Test]
    public function getAllTeamsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']]);

        $page = 1;
        $per_page = 1;
        $include_total_count = true;
        $exclude_policy_constrained = true;

        $result = $this->endpoint->getAllTeams($page, $per_page, $include_total_count, $exclude_policy_constrained);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'include_total_count' => '1', 'exclude_policy_constrained' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result[0]);
    }

    #[Test]
    public function getTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']);

        $team_id = 'test-team_id';

        $result = $this->endpoint->getTeam($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result);
    }

    #[Test]
    public function updateTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateTeamRequest(id: 'test-id', display_name: 'test-display_name', description: 'test-description', company_name: 'test-company_name', allowed_domains: 'test-allowed_domains', invite_id: 'test-invite_id', allow_open_invite: 'test-allow_open_invite');

        $result = $this->endpoint->updateTeam($team_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/teams/test-team_id');
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
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/teams/test-team_id');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['permanent' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateTeamPrivacyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateTeamPrivacyRequest(privacy: 'test-privacy');

        $result = $this->endpoint->updateTeamPrivacy($team_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/teams/test-team_id/privacy');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result);
    }

    #[Test]
    public function restoreTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']);

        $team_id = 'test-team_id';

        $result = $this->endpoint->restoreTeam($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/restore');
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/name/test-name');
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/name/test-name/exists');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamExists::class, $result);
    }

    #[Test]
    public function getTeamsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getTeamsForUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result[0]);
    }

    #[Test]
    public function getTeamMembersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['team_id' => 'test-team_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'delete_at' => 1234567890, 'scheme_user' => true, 'scheme_admin' => true, 'explicit_roles' => 'test-explicit_roles']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;
        $sort = 'test-sort';
        $exclude_deleted_users = true;

        $result = $this->endpoint->getTeamMembers($team_id, $page, $per_page, $sort, $exclude_deleted_users);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/members');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'sort' => 'test-sort', 'exclude_deleted_users' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamMember::class, $result[0]);
    }

    #[Test]
    public function addTeamMemberFromInviteBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['team_id' => 'test-team_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'delete_at' => 1234567890, 'scheme_user' => true, 'scheme_admin' => true, 'explicit_roles' => 'test-explicit_roles']);

        $token = 'test-token';

        $result = $this->endpoint->addTeamMemberFromInvite($token);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/members/invite');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['token' => 'test-token']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamMember::class, $result);
    }

    #[Test]
    public function addTeamMembersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, [['team_id' => 'test-team_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'delete_at' => 1234567890, 'scheme_user' => true, 'scheme_admin' => true, 'explicit_roles' => 'test-explicit_roles']]);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\AddTeamMembersRequest(items: []);
        $graceful = true;

        $result = $this->endpoint->addTeamMembers($team_id, $requestBody, $graceful);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/members/batch');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['graceful' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamMember::class, $result[0]);
    }

    #[Test]
    public function getTeamMembersForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['team_id' => 'test-team_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'delete_at' => 1234567890, 'scheme_user' => true, 'scheme_admin' => true, 'explicit_roles' => 'test-explicit_roles']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getTeamMembersForUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/members');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamMember::class, $result[0]);
    }

    #[Test]
    public function getTeamMemberBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['team_id' => 'test-team_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'delete_at' => 1234567890, 'scheme_user' => true, 'scheme_admin' => true, 'explicit_roles' => 'test-explicit_roles']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';

        $result = $this->endpoint->getTeamMember($team_id, $user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/members/test-user_id');
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
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/teams/test-team_id/members/test-user_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getTeamMembersByIdsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['team_id' => 'test-team_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'delete_at' => 1234567890, 'scheme_user' => true, 'scheme_admin' => true, 'explicit_roles' => 'test-explicit_roles']]);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetTeamMembersByIdsRequest(items: []);

        $result = $this->endpoint->getTeamMembersByIds($team_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/members/ids');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamMember::class, $result[0]);
    }

    #[Test]
    public function getTeamStatsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['team_id' => 'test-team_id', 'total_member_count' => 1234567890]);

        $team_id = 'test-team_id';

        $result = $this->endpoint->getTeamStats($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/stats');
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/regenerate_invite_id');
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
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/teams/test-team_id/image');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateTeamMemberRolesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateTeamMemberRolesRequest(roles: 'test-roles');

        $result = $this->endpoint->updateTeamMemberRoles($team_id, $user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/teams/test-team_id/members/test-user_id/roles');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateTeamMemberSchemeRolesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateTeamMemberSchemeRolesRequest(scheme_admin: true, scheme_user: true);

        $result = $this->endpoint->updateTeamMemberSchemeRoles($team_id, $user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/teams/test-team_id/members/test-user_id/schemeRoles');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getTeamsUnreadForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['team_id' => 'test-team_id', 'msg_count' => 1234567890, 'mention_count' => 1234567890]]);

        $user_id = 'test-user_id';
        $exclude_team = 'test-exclude_team';
        $include_collapsed_threads = true;

        $result = $this->endpoint->getTeamsUnreadForUser($user_id, $exclude_team, $include_collapsed_threads);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/unread');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['exclude_team' => 'test-exclude_team', 'include_collapsed_threads' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamUnread::class, $result[0]);
    }

    #[Test]
    public function getTeamUnreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['team_id' => 'test-team_id', 'msg_count' => 1234567890, 'mention_count' => 1234567890]);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';

        $result = $this->endpoint->getTeamUnread($user_id, $team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/unread');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\TeamUnread::class, $result);
    }

    #[Test]
    public function inviteUsersToTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\InviteUsersToTeamRequest(items: []);

        $result = $this->endpoint->inviteUsersToTeam($team_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/invite/email');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function inviteGuestsToTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\InviteGuestsToTeamRequest(emails: [], channels: []);
        $graceful = true;
        $guest_magic_link = true;

        $result = $this->endpoint->inviteGuestsToTeam($team_id, $requestBody, $graceful, $guest_magic_link);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/invite-guests/email');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['graceful' => '1', 'guest_magic_link' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function invalidateEmailInvitesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $result = $this->endpoint->invalidateEmailInvites();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/teams/invites/email');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function importTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['results' => 'test-results']);

        $team_id = 'test-team_id';
        $file = 'test-file-content';
        $filesize = 1;
        $importFrom = 'test-importFrom';

        $result = $this->endpoint->importTeam($team_id, $file, $filesize, $importFrom);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/import');
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/invite/test-invite_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetTeamInviteInfoResponse::class, $result);
    }

    #[Test]
    public function updateTeamSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateTeamSchemeRequest(scheme_id: 'test-scheme_id');

        $result = $this->endpoint->updateTeamScheme($team_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/teams/test-team_id/scheme');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/files/search');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\FileInfoList::class, $result);
    }
}
