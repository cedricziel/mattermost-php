<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\SchemesEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Scheme;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(SchemesEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Scheme::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
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
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $scope = 'test-scope';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getSchemes($scope, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'name' => 'test-name', 'description' => 'test-description', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'scope' => 'test-scope', 'default_team_admin_role' => 'test-default_team_admin_role', 'default_team_user_role' => 'test-default_team_user_role', 'default_channel_admin_role' => 'test-default_channel_admin_role', 'default_channel_user_role' => 'test-default_channel_user_role']);

        $scheme_id = 'test-scheme_id';

        $result = $this->endpoint->getScheme($scheme_id);

        $this->assertNotNull($this->getLastRequest());
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getTeamsForSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $scheme_id = 'test-scheme_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getTeamsForScheme($scheme_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelsForSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $scheme_id = 'test-scheme_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getChannelsForScheme($scheme_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
