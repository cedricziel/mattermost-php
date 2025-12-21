<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\UsersEndpoint;
use CedricZiel\MattermostPhp\Client\Model\GenerateMfaSecretResponse;
use CedricZiel\MattermostPhp\Client\Model\KnownUsers;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\User;
use CedricZiel\MattermostPhp\Client\Model\UserAccessTokenSanitized;
use CedricZiel\MattermostPhp\Client\Model\UserAutocomplete;
use CedricZiel\MattermostPhp\Client\Model\UserTermsOfService;
use CedricZiel\MattermostPhp\Client\Model\UsersStats;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(UsersEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UserAutocomplete::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(KnownUsers::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UsersStats::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(User::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GenerateMfaSecretResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UserAccessTokenSanitized::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UserTermsOfService::class)]
class UsersEndpointTest extends ClientTestCase
{
    public UsersEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new UsersEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getUsersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $page = 1;
        $per_page = 1;
        $in_team = 'test-in_team';
        $not_in_team = 'test-not_in_team';
        $in_channel = 'test-in_channel';
        $not_in_channel = 'test-not_in_channel';
        $in_group = 'test-in_group';
        $group_constrained = true;
        $without_team = true;
        $active = true;
        $inactive = true;
        $role = 'test-role';
        $sort = 'test-sort';
        $roles = 'test-roles';
        $channel_roles = 'test-channel_roles';
        $team_roles = 'test-team_roles';

        $result = $this->endpoint->getUsers($page, $per_page, $in_team, $not_in_team, $in_channel, $not_in_channel, $in_group, $group_constrained, $without_team, $active, $inactive, $role, $sort, $roles, $channel_roles, $team_roles);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function autocompleteUsersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['users' => [], 'out_of_channel' => []]);

        $name = 'test-name';
        $team_id = 'test-team_id';
        $channel_id = 'test-channel_id';
        $limit = 1;

        $result = $this->endpoint->autocompleteUsers($name, $team_id, $channel_id, $limit);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserAutocomplete::class, $result);
    }

    #[Test]
    public function getKnownUsersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['items' => 'test-items']);

        $result = $this->endpoint->getKnownUsers();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\KnownUsers::class, $result);
    }

    #[Test]
    public function getTotalUsersStatsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_users_count' => 1234567890]);

        $result = $this->endpoint->getTotalUsersStats();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UsersStats::class, $result);
    }

    #[Test]
    public function getTotalUsersStatsFilteredBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_users_count' => 1234567890]);

        $in_team = 'test-in_team';
        $in_channel = 'test-in_channel';
        $include_deleted = true;
        $include_bots = true;
        $roles = 'test-roles';
        $channel_roles = 'test-channel_roles';
        $team_roles = 'test-team_roles';

        $result = $this->endpoint->getTotalUsersStatsFiltered($in_team, $in_channel, $include_deleted, $include_bots, $roles, $channel_roles, $team_roles);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UsersStats::class, $result);
    }

    #[Test]
    public function getUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'notify_props' => 'test-notify_props', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 'test-timezone', 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result);
    }

    #[Test]
    public function deleteUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';

        $result = $this->endpoint->deleteUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getUserByUsernameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'notify_props' => 'test-notify_props', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 'test-timezone', 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $username = 'test-username';

        $result = $this->endpoint->getUserByUsername($username);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result);
    }

    #[Test]
    public function generateMfaSecretBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['secret' => 'test-secret', 'qr_code' => 'test-qr_code']);

        $user_id = 'test-user_id';

        $result = $this->endpoint->generateMfaSecret($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GenerateMfaSecretResponse::class, $result);
    }

    #[Test]
    public function demoteUserToGuestBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';

        $result = $this->endpoint->demoteUserToGuest($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function promoteGuestToUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';

        $result = $this->endpoint->promoteGuestToUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getUserByEmailBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'notify_props' => 'test-notify_props', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 'test-timezone', 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $email = 'test-email';

        $result = $this->endpoint->getUserByEmail($email);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result);
    }

    #[Test]
    public function getSessionsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getSessions($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function revokeAllSessionsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';

        $result = $this->endpoint->revokeAllSessions($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getUserAuditsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUserAudits($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function verifyUserEmailWithoutTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'notify_props' => 'test-notify_props', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 'test-timezone', 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->verifyUserEmailWithoutToken($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result);
    }

    #[Test]
    public function getUserAccessTokensForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getUserAccessTokensForUser($user_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getUserAccessTokensBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getUserAccessTokens($page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getUserAccessTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'user_id' => 'test-user_id', 'description' => 'test-description', 'is_active' => true]);

        $token_id = 'test-token_id';

        $result = $this->endpoint->getUserAccessToken($token_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserAccessTokenSanitized::class, $result);
    }

    #[Test]
    public function getUserTermsOfServiceBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'terms_of_service_id' => 'test-terms_of_service_id', 'create_at' => 1234567890]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUserTermsOfService($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserTermsOfService::class, $result);
    }

    #[Test]
    public function getUploadsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUploadsForUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelMembersWithTeamDataForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getChannelMembersWithTeamDataForUser($user_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getUsersWithInvalidEmailsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getUsersWithInvalidEmails($page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getServerLimitsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $result = $this->endpoint->getServerLimits();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
