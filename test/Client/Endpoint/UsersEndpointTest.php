<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\UsersEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Audit;
use CedricZiel\MattermostPhp\Client\Model\ChannelMemberWithTeamData;
use CedricZiel\MattermostPhp\Client\Model\CheckUserMfaRequest;
use CedricZiel\MattermostPhp\Client\Model\CheckUserMfaResponse;
use CedricZiel\MattermostPhp\Client\Model\CreateUserAccessTokenRequest;
use CedricZiel\MattermostPhp\Client\Model\CreateUserRequest;
use CedricZiel\MattermostPhp\Client\Model\DisableUserAccessTokenRequest;
use CedricZiel\MattermostPhp\Client\Model\EnableUserAccessTokenRequest;
use CedricZiel\MattermostPhp\Client\Model\GenerateMfaSecretResponse;
use CedricZiel\MattermostPhp\Client\Model\GetUsersByGroupChannelIdsRequest;
use CedricZiel\MattermostPhp\Client\Model\GetUsersByGroupChannelIdsResponse;
use CedricZiel\MattermostPhp\Client\Model\GetUsersByIdsRequest;
use CedricZiel\MattermostPhp\Client\Model\GetUsersByUsernamesRequest;
use CedricZiel\MattermostPhp\Client\Model\KnownUsers;
use CedricZiel\MattermostPhp\Client\Model\LoginSSOCodeExchangeRequest;
use CedricZiel\MattermostPhp\Client\Model\LoginSSOCodeExchangeResponse;
use CedricZiel\MattermostPhp\Client\Model\MigrateAuthToLdapRequest;
use CedricZiel\MattermostPhp\Client\Model\PublishUserTypingRequest;
use CedricZiel\MattermostPhp\Client\Model\RegisterTermsOfServiceActionRequest;
use CedricZiel\MattermostPhp\Client\Model\ResetPasswordRequest;
use CedricZiel\MattermostPhp\Client\Model\RevokeSessionRequest;
use CedricZiel\MattermostPhp\Client\Model\RevokeUserAccessTokenRequest;
use CedricZiel\MattermostPhp\Client\Model\SearchUserAccessTokensRequest;
use CedricZiel\MattermostPhp\Client\Model\SearchUsersRequest;
use CedricZiel\MattermostPhp\Client\Model\SendPasswordResetEmailRequest;
use CedricZiel\MattermostPhp\Client\Model\SendVerificationEmailRequest;
use CedricZiel\MattermostPhp\Client\Model\ServerLimits;
use CedricZiel\MattermostPhp\Client\Model\Session;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\SwitchAccountTypeRequest;
use CedricZiel\MattermostPhp\Client\Model\SwitchAccountTypeResponse;
use CedricZiel\MattermostPhp\Client\Model\UpdateUserActiveRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateUserMfaRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateUserPasswordRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateUserRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateUserRolesRequest;
use CedricZiel\MattermostPhp\Client\Model\UploadSession;
use CedricZiel\MattermostPhp\Client\Model\User;
use CedricZiel\MattermostPhp\Client\Model\UserAccessToken;
use CedricZiel\MattermostPhp\Client\Model\UserAccessTokenSanitized;
use CedricZiel\MattermostPhp\Client\Model\UserAutocomplete;
use CedricZiel\MattermostPhp\Client\Model\UserTermsOfService;
use CedricZiel\MattermostPhp\Client\Model\UsersStats;
use CedricZiel\MattermostPhp\Client\Model\VerifyUserEmailRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(UsersEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(LoginSSOCodeExchangeResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(User::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetUsersByGroupChannelIdsResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UserAutocomplete::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(KnownUsers::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UsersStats::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GenerateMfaSecretResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(CheckUserMfaResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Session::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Audit::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(SwitchAccountTypeResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UserAccessToken::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UserAccessTokenSanitized::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UserTermsOfService::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UploadSession::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelMemberWithTeamData::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ServerLimits::class)]
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
    public function loginSSOCodeExchangeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['token' => 'test-token', 'csrf' => 'test-csrf']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\LoginSSOCodeExchangeRequest(login_code: 'test-login_code', code_verifier: 'test-code_verifier', state: 'test-state');

        $result = $this->endpoint->loginSSOCodeExchange($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/login/sso/code-exchange');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\LoginSSOCodeExchangeResponse::class, $result);
    }

    #[Test]
    public function logoutBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['status' => 'test-status']);

        $result = $this->endpoint->logout();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/logout');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function createUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateUserRequest(email: 'test-email', username: 'test-username');
        $t = 'test-t';
        $iid = 'test-iid';

        $result = $this->endpoint->createUser($requestBody, $t, $iid);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['t' => 'test-t', 'iid' => 'test-iid']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result);
    }

    #[Test]
    public function getUsersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]]);

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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'in_team' => 'test-in_team', 'not_in_team' => 'test-not_in_team', 'in_channel' => 'test-in_channel', 'not_in_channel' => 'test-not_in_channel', 'in_group' => 'test-in_group', 'group_constrained' => '1', 'without_team' => '1', 'active' => '1', 'inactive' => '1', 'role' => 'test-role', 'sort' => 'test-sort', 'roles' => 'test-roles', 'channel_roles' => 'test-channel_roles', 'team_roles' => 'test-team_roles']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result[0]);
    }

    #[Test]
    public function permanentDeleteAllUsersBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $this->endpoint->permanentDeleteAllUsers();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/users');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getUsersByIdsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetUsersByIdsRequest(items: []);
        $since = 1;

        $result = $this->endpoint->getUsersByIds($requestBody, $since);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/ids');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['since' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result[0]);
    }

    #[Test]
    public function getUsersByGroupChannelIdsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetUsersByGroupChannelIdsRequest(items: []);

        $result = $this->endpoint->getUsersByGroupChannelIds($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/group_channels');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetUsersByGroupChannelIdsResponse::class, $result);
    }

    #[Test]
    public function getUsersByUsernamesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetUsersByUsernamesRequest(items: []);

        $result = $this->endpoint->getUsersByUsernames($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/usernames');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result[0]);
    }

    #[Test]
    public function searchUsersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SearchUsersRequest(term: 'test-term');

        $result = $this->endpoint->searchUsers($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/search');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result[0]);
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/autocomplete');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'name' => 'test-name', 'limit' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserAutocomplete::class, $result);
    }

    #[Test]
    public function getKnownUsersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['items' => 'test-items']);

        $result = $this->endpoint->getKnownUsers();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/known');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\KnownUsers::class, $result);
    }

    #[Test]
    public function getTotalUsersStatsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total_users_count' => 1234567890]);

        $result = $this->endpoint->getTotalUsersStats();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/stats');
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/stats/filtered');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['in_team' => 'test-in_team', 'in_channel' => 'test-in_channel', 'include_deleted' => '1', 'include_bots' => '1', 'roles' => 'test-roles', 'channel_roles' => 'test-channel_roles', 'team_roles' => 'test-team_roles']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UsersStats::class, $result);
    }

    #[Test]
    public function getUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result);
    }

    #[Test]
    public function updateUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateUserRequest(id: 'test-id', email: 'test-email', username: 'test-username');

        $result = $this->endpoint->updateUser($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id');
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
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/users/test-user_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateUserRolesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateUserRolesRequest(roles: 'test-roles');

        $result = $this->endpoint->updateUserRoles($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/roles');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateUserActiveBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateUserActiveRequest(active: true);

        $result = $this->endpoint->updateUserActive($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/active');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getUserByUsernameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $username = 'test-username';

        $result = $this->endpoint->getUserByUsername($username);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/username/test-username');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result);
    }

    #[Test]
    public function resetPasswordBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\ResetPasswordRequest(code: 'test-code', new_password: 'test-new_password');

        $result = $this->endpoint->resetPassword($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/password/reset');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateUserMfaBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateUserMfaRequest(activate: true);

        $result = $this->endpoint->updateUserMfa($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/mfa');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function generateMfaSecretBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['secret' => 'test-secret', 'qr_code' => 'test-qr_code']);

        $user_id = 'test-user_id';

        $result = $this->endpoint->generateMfaSecret($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/mfa/generate');
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/demote');
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/promote');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function checkUserMfaBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['mfa_required' => true]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CheckUserMfaRequest(login_id: 'test-login_id');

        $result = $this->endpoint->checkUserMfa($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/mfa');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\CheckUserMfaResponse::class, $result);
    }

    #[Test]
    public function updateUserPasswordBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateUserPasswordRequest(new_password: 'test-new_password');

        $result = $this->endpoint->updateUserPassword($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/password');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function sendPasswordResetEmailBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SendPasswordResetEmailRequest(email: 'test-email');

        $result = $this->endpoint->sendPasswordResetEmail($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/password/reset/send');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getUserByEmailBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $email = 'test-email';

        $result = $this->endpoint->getUserByEmail($email);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/email/test-email');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result);
    }

    #[Test]
    public function getSessionsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['create_at' => 1234567890, 'device_id' => 'test-device_id', 'expires_at' => 1234567890, 'id' => 'test-id', 'is_oauth' => true, 'last_activity_at' => 1234567890, 'roles' => 'test-roles', 'team_members' => [], 'token' => 'test-token', 'user_id' => 'test-user_id']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getSessions($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/sessions');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Session::class, $result[0]);
    }

    #[Test]
    public function revokeSessionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\RevokeSessionRequest(session_id: 'test-session_id');

        $result = $this->endpoint->revokeSession($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/sessions/revoke');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function revokeAllSessionsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';

        $result = $this->endpoint->revokeAllSessions($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/sessions/revoke/all');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getUserAuditsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'user_id' => 'test-user_id', 'action' => 'test-action', 'extra_info' => 'test-extra_info', 'ip_address' => 'test-ip_address', 'session_id' => 'test-session_id']]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUserAudits($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/audits');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Audit::class, $result[0]);
    }

    #[Test]
    public function verifyUserEmailWithoutTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->verifyUserEmailWithoutToken($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/email/verify/member');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result);
    }

    #[Test]
    public function verifyUserEmailBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\VerifyUserEmailRequest(token: 'test-token');

        $result = $this->endpoint->verifyUserEmail($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/email/verify');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function sendVerificationEmailBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SendVerificationEmailRequest(email: 'test-email');

        $result = $this->endpoint->sendVerificationEmail($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/email/verify/send');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function switchAccountTypeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['follow_link' => 'test-follow_link']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SwitchAccountTypeRequest(current_service: 'test-current_service', new_service: 'test-new_service');

        $result = $this->endpoint->switchAccountType($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/login/switch');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SwitchAccountTypeResponse::class, $result);
    }

    #[Test]
    public function createUserAccessTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'token' => 'test-token', 'user_id' => 'test-user_id', 'description' => 'test-description']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateUserAccessTokenRequest(description: 'test-description');

        $result = $this->endpoint->createUserAccessToken($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/tokens');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserAccessToken::class, $result);
    }

    #[Test]
    public function getUserAccessTokensForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'user_id' => 'test-user_id', 'description' => 'test-description', 'is_active' => true]]);

        $user_id = 'test-user_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getUserAccessTokensForUser($user_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/tokens');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserAccessTokenSanitized::class, $result[0]);
    }

    #[Test]
    public function getUserAccessTokensBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'user_id' => 'test-user_id', 'description' => 'test-description', 'is_active' => true]]);

        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getUserAccessTokens($page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/tokens');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserAccessTokenSanitized::class, $result[0]);
    }

    #[Test]
    public function revokeUserAccessTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\RevokeUserAccessTokenRequest(token_id: 'test-token_id');

        $result = $this->endpoint->revokeUserAccessToken($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/tokens/revoke');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getUserAccessTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'user_id' => 'test-user_id', 'description' => 'test-description', 'is_active' => true]);

        $token_id = 'test-token_id';

        $result = $this->endpoint->getUserAccessToken($token_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/tokens/test-token_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserAccessTokenSanitized::class, $result);
    }

    #[Test]
    public function disableUserAccessTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\DisableUserAccessTokenRequest(token_id: 'test-token_id');

        $result = $this->endpoint->disableUserAccessToken($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/tokens/disable');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function enableUserAccessTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\EnableUserAccessTokenRequest(token_id: 'test-token_id');

        $result = $this->endpoint->enableUserAccessToken($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/tokens/enable');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function searchUserAccessTokensBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'user_id' => 'test-user_id', 'description' => 'test-description', 'is_active' => true]]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SearchUserAccessTokensRequest(term: 'test-term');

        $result = $this->endpoint->searchUserAccessTokens($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/tokens/search');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserAccessTokenSanitized::class, $result[0]);
    }

    #[Test]
    public function registerTermsOfServiceActionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\RegisterTermsOfServiceActionRequest(serviceTermsId: 'test-serviceTermsId', accepted: 'test-accepted');

        $result = $this->endpoint->registerTermsOfServiceAction($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/terms_of_service');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getUserTermsOfServiceBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'terms_of_service_id' => 'test-terms_of_service_id', 'create_at' => 1234567890]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUserTermsOfService($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/terms_of_service');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserTermsOfService::class, $result);
    }

    #[Test]
    public function revokeSessionsFromAllUsersBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $this->endpoint->revokeSessionsFromAllUsers();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/sessions/revoke/all');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function publishUserTypingBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\PublishUserTypingRequest(channel_id: 'test-channel_id');

        $this->endpoint->publishUserTyping($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/typing');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getUploadsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'type' => 'test-type', 'create_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'filename' => 'test-filename', 'file_size' => 1234567890, 'file_offset' => 1234567890]]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUploadsForUser($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/uploads');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UploadSession::class, $result[0]);
    }

    #[Test]
    public function getChannelMembersWithTeamDataForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['channel_id' => 'test-channel_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'last_viewed_at' => 1234567890, 'msg_count' => 1234567890, 'mention_count' => 1234567890, 'last_update_at' => 1234567890, 'team_display_name' => 'test-team_display_name', 'team_name' => 'test-team_name', 'team_update_at' => 1234567890]]);

        $user_id = 'test-user_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getChannelMembersWithTeamDataForUser($user_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/channel_members');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelMemberWithTeamData::class, $result[0]);
    }

    #[Test]
    public function migrateAuthToLdapBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\MigrateAuthToLdapRequest(from: 'test-from', match_field: 'test-match_field', force: true);

        $this->endpoint->migrateAuthToLdap($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/migrate_auth/ldap');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getUsersWithInvalidEmailsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]]);

        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getUsersWithInvalidEmails($page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/invalid_emails');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result[0]);
    }

    #[Test]
    public function resetPasswordFailedAttemptsBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';

        $this->endpoint->resetPasswordFailedAttempts($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/reset_failed_attempts');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getServerLimitsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['maxUsersLimit' => 1234567890, 'activeUserCount' => 1234567890]]);

        $result = $this->endpoint->getServerLimits();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/limits/server');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ServerLimits::class, $result[0]);
    }
}
