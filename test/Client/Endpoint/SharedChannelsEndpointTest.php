<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\SharedChannelsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CanUserDirectMessageResponse;
use CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo;
use CedricZiel\MattermostPhp\Client\Model\SharedChannel;
use CedricZiel\MattermostPhp\Client\Model\SharedChannelRemote;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(SharedChannelsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(SharedChannel::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(SharedChannelRemote::class)]
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
        $this->mockJsonResponse(200, [['id' => 'test-id', 'team_id' => 'test-team_id', 'home' => true, 'readonly' => true, 'name' => 'test-name', 'display_name' => 'test-display_name', 'purpose' => 'test-purpose', 'header' => 'test-header', 'creator_id' => 'test-creator_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'remote_id' => 'test-remote_id']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getAllSharedChannels($team_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/sharedchannels/test-team_id');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SharedChannel::class, $result[0]);
    }

    #[Test]
    public function getSharedChannelRemotesByRemoteClusterBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'channel_id' => 'test-channel_id', 'creator_id' => 'test-creator_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'is_invite_accepted' => true, 'is_invite_confirmed' => true, 'remote_id' => 'test-remote_id', 'last_post_update_at' => 1234567890, 'last_post_id' => 'test-last_post_id', 'last_post_create_at' => 'test-last_post_create_at', 'last_post_create_id' => 'test-last_post_create_id']]);

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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/remotecluster/test-remote_id/sharedchannelremotes');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['include_unconfirmed' => '1', 'exclude_confirmed' => '1', 'exclude_home' => '1', 'exclude_remote' => '1', 'include_deleted' => '1', 'page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SharedChannelRemote::class, $result[0]);
    }

    #[Test]
    public function getRemoteClusterInfoBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['display_name' => 'test-display_name', 'create_at' => 1234567890, 'last_ping_at' => 1234567890]);

        $remote_id = 'test-remote_id';

        $result = $this->endpoint->getRemoteClusterInfo($remote_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/sharedchannels/remote_info/test-remote_id');
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/remotecluster/test-remote_id/channels/test-channel_id/invite');
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/remotecluster/test-remote_id/channels/test-channel_id/uninvite');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getSharedChannelRemotesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['display_name' => 'test-display_name', 'create_at' => 1234567890, 'last_ping_at' => 1234567890]]);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getSharedChannelRemotes($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/sharedchannels/test-channel_id/remotes');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RemoteClusterInfo::class, $result[0]);
    }

    #[Test]
    public function canUserDirectMessageBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['can_dm' => true]);

        $user_id = 'test-user_id';
        $other_user_id = 'test-other_user_id';

        $result = $this->endpoint->canUserDirectMessage($user_id, $other_user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/sharedchannels/users/test-user_id/can_dm/test-other_user_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\CanUserDirectMessageResponse::class, $result);
    }
}
