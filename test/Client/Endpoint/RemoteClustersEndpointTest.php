<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\RemoteClustersEndpoint;
use CedricZiel\MattermostPhp\Client\Model\RemoteCluster;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(RemoteClustersEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(RemoteCluster::class)]
class RemoteClustersEndpointTest extends ClientTestCase
{
    public RemoteClustersEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new RemoteClustersEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getRemoteClustersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $page = 1;
        $per_page = 1;
        $exclude_offline = true;
        $in_channel = 'test-in_channel';
        $not_in_channel = 'test-not_in_channel';
        $only_confirmed = true;
        $only_plugins = true;
        $exclude_plugins = true;
        $include_deleted = true;

        $result = $this->endpoint->getRemoteClusters($page, $per_page, $exclude_offline, $in_channel, $not_in_channel, $only_confirmed, $only_plugins, $exclude_plugins, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getRemoteClusterBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['remote_id' => 'test-remote_id', 'remote_team_id' => 'test-remote_team_id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'site_url' => 'test-site_url', 'default_team_id' => 'test-default_team_id', 'create_at' => 1234567890, 'delete_at' => 1234567890, 'last_ping_at' => 1234567890, 'token' => 'test-token', 'remote_token' => 'test-remote_token', 'topics' => 'test-topics', 'creator_id' => 'test-creator_id', 'plugin_id' => 'test-plugin_id', 'options' => 1234567890]);

        $remote_id = 'test-remote_id';

        $result = $this->endpoint->getRemoteCluster($remote_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RemoteCluster::class, $result);
    }
}
