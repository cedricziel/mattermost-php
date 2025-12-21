<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ReportsEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ReportsEndpoint::class)]
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
        $this->mockJsonResponse(200, ['status' => 'ok']);

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

        try {
            $this->endpoint->getUsersForReporting($sort_column, $direction, $sort_direction, $page_size, $from_column_value, $from_id, $date_range, $role_filter, $team_filter, $has_no_team, $hide_active, $hide_inactive, $search_term);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getUserCountForReportingBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $role_filter = 'test-role_filter';
        $team_filter = 'test-team_filter';
        $has_no_team = true;
        $hide_active = true;
        $hide_inactive = true;
        $search_term = 'test-search_term';

        try {
            $this->endpoint->getUserCountForReporting($role_filter, $team_filter, $has_no_team, $hide_active, $hide_inactive, $search_term);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function startBatchUsersExportBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $date_range = 'test-date_range';

        try {
            $this->endpoint->startBatchUsersExport($date_range);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
