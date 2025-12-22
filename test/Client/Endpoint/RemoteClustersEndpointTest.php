<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\RemoteClustersEndpoint;
use CedricZiel\MattermostPhp\Client\Model\AcceptRemoteClusterInviteRequest;
use CedricZiel\MattermostPhp\Client\Model\CreateRemoteClusterRequest;
use CedricZiel\MattermostPhp\Client\Model\CreateRemoteClusterResponse;
use CedricZiel\MattermostPhp\Client\Model\GenerateRemoteClusterInviteRequest;
use CedricZiel\MattermostPhp\Client\Model\RemoteCluster;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(RemoteClustersEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(RemoteCluster::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(CreateRemoteClusterResponse::class)]
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
        $this->mockJsonResponse(200, [['remote_id' => 'test-remote_id', 'remote_team_id' => 'test-remote_team_id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'site_url' => 'test-site_url', 'default_team_id' => 'test-default_team_id', 'create_at' => 1234567890, 'delete_at' => 1234567890, 'last_ping_at' => 1234567890, 'token' => 'test-token', 'remote_token' => 'test-remote_token', 'topics' => 'test-topics', 'creator_id' => 'test-creator_id', 'plugin_id' => 'test-plugin_id', 'options' => 1234567890]]);

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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/remotecluster');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'exclude_offline' => '1', 'in_channel' => 'test-in_channel', 'not_in_channel' => 'test-not_in_channel', 'only_confirmed' => '1', 'only_plugins' => '1', 'exclude_plugins' => '1', 'include_deleted' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RemoteCluster::class, $result[0]);
    }

    #[Test]
    public function createRemoteClusterBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['invite' => 'test-invite', 'password' => 'test-password']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateRemoteClusterRequest(name: 'test-name', default_team_id: 'test-default_team_id');

        $result = $this->endpoint->createRemoteCluster($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/remotecluster');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\CreateRemoteClusterResponse::class, $result);
    }

    #[Test]
    public function getRemoteClusterBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['remote_id' => 'test-remote_id', 'remote_team_id' => 'test-remote_team_id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'site_url' => 'test-site_url', 'default_team_id' => 'test-default_team_id', 'create_at' => 1234567890, 'delete_at' => 1234567890, 'last_ping_at' => 1234567890, 'token' => 'test-token', 'remote_token' => 'test-remote_token', 'topics' => 'test-topics', 'creator_id' => 'test-creator_id', 'plugin_id' => 'test-plugin_id', 'options' => 1234567890]);

        $remote_id = 'test-remote_id';

        $result = $this->endpoint->getRemoteCluster($remote_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/remotecluster/test-remote_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RemoteCluster::class, $result);
    }

    #[Test]
    public function deleteRemoteClusterBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(204);

        $remote_id = 'test-remote_id';

        $this->endpoint->deleteRemoteCluster($remote_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/remotecluster/test-remote_id');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function generateRemoteClusterInviteBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, 'test-response-value');

        $remote_id = 'test-remote_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GenerateRemoteClusterInviteRequest(password: 'test-password');

        $result = $this->endpoint->generateRemoteClusterInvite($remote_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/remotecluster/test-remote_id/generate_invite');
        $this->assertRequestHasAuthHeader();
        $this->assertIsString($result);
    }

    #[Test]
    public function acceptRemoteClusterInviteBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['remote_id' => 'test-remote_id', 'remote_team_id' => 'test-remote_team_id', 'name' => 'test-name', 'display_name' => 'test-display_name', 'site_url' => 'test-site_url', 'default_team_id' => 'test-default_team_id', 'create_at' => 1234567890, 'delete_at' => 1234567890, 'last_ping_at' => 1234567890, 'token' => 'test-token', 'remote_token' => 'test-remote_token', 'topics' => 'test-topics', 'creator_id' => 'test-creator_id', 'plugin_id' => 'test-plugin_id', 'options' => 1234567890]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\AcceptRemoteClusterInviteRequest(invite: 'test-invite', name: 'test-name', default_team_id: 'test-default_team_id', password: 'test-password');

        $result = $this->endpoint->acceptRemoteClusterInvite($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/remotecluster/accept_invite');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RemoteCluster::class, $result);
    }
}
