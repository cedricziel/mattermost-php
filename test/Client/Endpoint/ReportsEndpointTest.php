<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ReportsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\GetPostsForReportingRequest;
use CedricZiel\MattermostPhp\Client\Model\GetPostsForReportingResponse;
use CedricZiel\MattermostPhp\Client\Model\UserReport;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ReportsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UserReport::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetPostsForReportingResponse::class)]
class ReportsEndpointTest extends ClientTestCase
{
    public ReportsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ReportsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getUsersForReportingBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'auth_data' => 'test-auth_data', 'auth_service' => 'test-auth_service', 'email' => 'test-email', 'nickname' => 'test-nickname', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'position' => 'test-position', 'roles' => 'test-roles', 'locale' => 'test-locale', 'timezone' => 1234567890, 'disable_welcome_email' => true, 'last_login' => 1234567890, 'last_status_at' => 1234567890, 'last_post_date' => 1234567890, 'days_active' => 1234567890, 'total_posts' => 1234567890]]);

        $sort_column = 'test-sort_column';
        $direction = 'test-direction';
        $sort_direction = 'test-sort_direction';
        $page_size = 1;
        $from_column_value = 'test-from_column_value';
        $from_id = 'test-from_id';
        $date_range = 'test-date_range';
        $role_filter = 'test-role_filter';
        $team_filter = 'test-team_filter';
        $has_no_team = true;
        $hide_active = true;
        $hide_inactive = true;
        $search_term = 'test-search_term';

        $result = $this->endpoint->getUsersForReporting($sort_column, $direction, $sort_direction, $page_size, $from_column_value, $from_id, $date_range, $role_filter, $team_filter, $has_no_team, $hide_active, $hide_inactive, $search_term);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/reports/users');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['sort_column' => 'test-sort_column', 'direction' => 'test-direction', 'sort_direction' => 'test-sort_direction', 'page_size' => '1', 'from_column_value' => 'test-from_column_value', 'from_id' => 'test-from_id', 'date_range' => 'test-date_range', 'role_filter' => 'test-role_filter', 'team_filter' => 'test-team_filter', 'has_no_team' => '1', 'hide_active' => '1', 'hide_inactive' => '1', 'search_term' => 'test-search_term']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserReport::class, $result[0]);
    }

    #[Test]
    public function getUserCountForReportingBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, 42);

        $role_filter = 'test-role_filter';
        $team_filter = 'test-team_filter';
        $has_no_team = true;
        $hide_active = true;
        $hide_inactive = true;
        $search_term = 'test-search_term';

        $result = $this->endpoint->getUserCountForReporting($role_filter, $team_filter, $has_no_team, $hide_active, $hide_inactive, $search_term);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/reports/users/count');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['role_filter' => 'test-role_filter', 'team_filter' => 'test-team_filter', 'has_no_team' => '1', 'hide_active' => '1', 'hide_inactive' => '1', 'search_term' => 'test-search_term']);
        $this->assertIsInt($result);
    }

    #[Test]
    public function getPostsForReportingBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, []);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetPostsForReportingRequest(channel_id: 'test-channel_id');

        $result = $this->endpoint->getPostsForReporting($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/reports/posts');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetPostsForReportingResponse::class, $result);
    }
}
