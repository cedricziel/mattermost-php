<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\SharedChannelsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CanUserDirectMessageResponse;
use CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(SharedChannelsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(RemoteClusterInfo::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(CanUserDirectMessageResponse::class)]
class SharedChannelsEndpointTest extends ClientTestCase
{
    public SharedChannelsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new SharedChannelsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getAllSharedChannelsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getAllSharedChannels($team_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getSharedChannelRemotesByRemoteClusterBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $remote_id = 'test-remote_id';
        $include_unconfirmed = true;
        $exclude_confirmed = true;
        $exclude_home = true;
        $exclude_remote = true;
        $include_deleted = true;
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getSharedChannelRemotesByRemoteCluster($remote_id, $include_unconfirmed, $exclude_confirmed, $exclude_home, $exclude_remote, $include_deleted, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getRemoteClusterInfoBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['display_name' => 'test-display_name', 'create_at' => 1234567890, 'last_ping_at' => 1234567890]);

        $remote_id = 'test-remote_id';

        $result = $this->endpoint->getRemoteClusterInfo($remote_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo::class, $result);
    }

    #[Test]
    public function inviteRemoteClusterToChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $remote_id = 'test-remote_id';
        $channel_id = 'test-channel_id';

        $result = $this->endpoint->inviteRemoteClusterToChannel($remote_id, $channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function uninviteRemoteClusterToChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $remote_id = 'test-remote_id';
        $channel_id = 'test-channel_id';

        $result = $this->endpoint->uninviteRemoteClusterToChannel($remote_id, $channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getSharedChannelRemotesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getSharedChannelRemotes($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function canUserDirectMessageBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['can_dm' => true]);

        $user_id = 'test-user_id';
        $other_user_id = 'test-other_user_id';

        $result = $this->endpoint->canUserDirectMessage($user_id, $other_user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\CanUserDirectMessageResponse::class, $result);
    }
}
