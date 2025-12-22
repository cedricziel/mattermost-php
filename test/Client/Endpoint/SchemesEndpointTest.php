<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\SchemesEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Channel;
use CedricZiel\MattermostPhp\Client\Model\CreateSchemeRequest;
use CedricZiel\MattermostPhp\Client\Model\Scheme;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\Team;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(SchemesEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Scheme::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Team::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Channel::class)]
class SchemesEndpointTest extends ClientTestCase
{
    public SchemesEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new SchemesEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getSchemesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'name' => 'test-name', 'description' => 'test-description', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'scope' => 'test-scope', 'default_team_admin_role' => 'test-default_team_admin_role', 'default_team_user_role' => 'test-default_team_user_role', 'default_channel_admin_role' => 'test-default_channel_admin_role', 'default_channel_user_role' => 'test-default_channel_user_role']]);

        $scope = 'test-scope';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getSchemes($scope, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/schemes');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['scope' => 'test-scope', 'page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Scheme::class, $result[0]);
    }

    #[Test]
    public function createSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'name' => 'test-name', 'description' => 'test-description', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'scope' => 'test-scope', 'default_team_admin_role' => 'test-default_team_admin_role', 'default_team_user_role' => 'test-default_team_user_role', 'default_channel_admin_role' => 'test-default_channel_admin_role', 'default_channel_user_role' => 'test-default_channel_user_role']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateSchemeRequest(display_name: 'test-display_name', scope: 'test-scope');

        $result = $this->endpoint->createScheme($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/schemes');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Scheme::class, $result);
    }

    #[Test]
    public function getSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'description' => 'test-description', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'scope' => 'test-scope', 'default_team_admin_role' => 'test-default_team_admin_role', 'default_team_user_role' => 'test-default_team_user_role', 'default_channel_admin_role' => 'test-default_channel_admin_role', 'default_channel_user_role' => 'test-default_channel_user_role']);

        $scheme_id = 'test-scheme_id';

        $result = $this->endpoint->getScheme($scheme_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/schemes/test-scheme_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Scheme::class, $result);
    }

    #[Test]
    public function deleteSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $scheme_id = 'test-scheme_id';

        $result = $this->endpoint->deleteScheme($scheme_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/schemes/test-scheme_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getTeamsForSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']]);

        $scheme_id = 'test-scheme_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getTeamsForScheme($scheme_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/schemes/test-scheme_id/teams');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result[0]);
    }

    #[Test]
    public function getChannelsForSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $scheme_id = 'test-scheme_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getChannelsForScheme($scheme_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/schemes/test-scheme_id/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }
}
