<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ChannelsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Channel;
use CedricZiel\MattermostPhp\Client\Model\ChannelListWithTeamData;
use CedricZiel\MattermostPhp\Client\Model\ChannelMember;
use CedricZiel\MattermostPhp\Client\Model\ChannelModeration;
use CedricZiel\MattermostPhp\Client\Model\ChannelStats;
use CedricZiel\MattermostPhp\Client\Model\ChannelUnread;
use CedricZiel\MattermostPhp\Client\Model\CreateChannelRequest;
use CedricZiel\MattermostPhp\Client\Model\CreateDirectChannelRequest;
use CedricZiel\MattermostPhp\Client\Model\CreateGroupChannelRequest;
use CedricZiel\MattermostPhp\Client\Model\GetChannelMembersByIdsRequest;
use CedricZiel\MattermostPhp\Client\Model\GetPublicChannelsByIdsForTeamRequest;
use CedricZiel\MattermostPhp\Client\Model\MoveChannelRequest;
use CedricZiel\MattermostPhp\Client\Model\OrderedSidebarCategories;
use CedricZiel\MattermostPhp\Client\Model\PostList;
use CedricZiel\MattermostPhp\Client\Model\SearchAllChannelsRequest;
use CedricZiel\MattermostPhp\Client\Model\SearchAllChannelsResponse;
use CedricZiel\MattermostPhp\Client\Model\SearchChannelsRequest;
use CedricZiel\MattermostPhp\Client\Model\SearchGroupChannelsRequest;
use CedricZiel\MattermostPhp\Client\Model\SidebarCategory;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\Team;
use CedricZiel\MattermostPhp\Client\Model\UpdateChannelMemberSchemeRolesRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateChannelPrivacyRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateChannelRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateChannelRolesRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateChannelSchemeRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateSidebarCategoriesForTeamForUserRequest;
use CedricZiel\MattermostPhp\Client\Model\ViewChannelRequest;
use CedricZiel\MattermostPhp\Client\Model\ViewChannelResponse;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ChannelsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelListWithTeamData::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Channel::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(SearchAllChannelsResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelStats::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PostList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelMember::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ViewChannelResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelUnread::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelModeration::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(OrderedSidebarCategories::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(SidebarCategory::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Team::class)]
class ChannelsEndpointTest extends ClientTestCase
{
    public ChannelsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ChannelsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getAllChannelsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['items' => []]);

        $not_associated_to_group = 'test-not_associated_to_group';
        $page = 1;
        $per_page = 1;
        $exclude_default_channels = true;
        $include_deleted = true;
        $include_total_count = true;
        $exclude_policy_constrained = true;

        $result = $this->endpoint->getAllChannels($not_associated_to_group, $page, $per_page, $exclude_default_channels, $include_deleted, $include_total_count, $exclude_policy_constrained);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['not_associated_to_group' => 'test-not_associated_to_group', 'page' => '1', 'per_page' => '1', 'exclude_default_channels' => '1', 'include_deleted' => '1', 'include_total_count' => '1', 'exclude_policy_constrained' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelListWithTeamData::class, $result);
    }

    #[Test]
    public function createChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateChannelRequest(team_id: 'test-team_id', name: 'test-name', display_name: 'test-display_name', type: 'test-type');

        $result = $this->endpoint->createChannel($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function createDirectChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateDirectChannelRequest(items: []);

        $result = $this->endpoint->createDirectChannel($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels/direct');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function createGroupChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateGroupChannelRequest(items: []);

        $result = $this->endpoint->createGroupChannel($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels/group');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function searchAllChannelsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['channels' => [], 'total_count' => 1234567890]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SearchAllChannelsRequest(term: 'test-term');
        $system_console = true;

        $result = $this->endpoint->searchAllChannels($requestBody, $system_console);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels/search');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['system_console' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SearchAllChannelsResponse::class, $result);
    }

    #[Test]
    public function searchGroupChannelsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SearchGroupChannelsRequest(term: 'test-term');

        $result = $this->endpoint->searchGroupChannels($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels/group/search');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function getPublicChannelsByIdsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetPublicChannelsByIdsForTeamRequest(items: []);

        $result = $this->endpoint->getPublicChannelsByIdsForTeam($team_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/channels/ids');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function getChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getChannel($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function updateChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $channel_id = 'test-channel_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateChannelRequest(id: 'test-id');

        $result = $this->endpoint->updateChannel($channel_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/channels/test-channel_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function deleteChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->deleteChannel($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/channels/test-channel_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateChannelPrivacyBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $channel_id = 'test-channel_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateChannelPrivacyRequest(privacy: 'test-privacy');

        $result = $this->endpoint->updateChannelPrivacy($channel_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/privacy');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function restoreChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->restoreChannel($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/restore');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function moveChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $channel_id = 'test-channel_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\MoveChannelRequest(team_id: 'test-team_id');

        $result = $this->endpoint->moveChannel($channel_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/move');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function getChannelStatsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['channel_id' => 'test-channel_id', 'member_count' => 1234567890]);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getChannelStats($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/stats');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelStats::class, $result);
    }

    #[Test]
    public function getPinnedPostsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['order' => [], 'next_post_id' => 'test-next_post_id', 'prev_post_id' => 'test-prev_post_id', 'has_next' => true]);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getPinnedPosts($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/pinned');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostList::class, $result);
    }

    #[Test]
    public function getPublicChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getPublicChannelsForTeam($team_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function getPrivateChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getPrivateChannelsForTeam($team_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/channels/private');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function getDeletedChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getDeletedChannelsForTeam($team_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/channels/deleted');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function autocompleteChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $team_id = 'test-team_id';
        $name = 'test-name';

        $result = $this->endpoint->autocompleteChannelsForTeam($team_id, $name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/channels/autocomplete');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['name' => 'test-name']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function autocompleteChannelsForTeamForSearchBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $team_id = 'test-team_id';
        $name = 'test-name';

        $result = $this->endpoint->autocompleteChannelsForTeamForSearch($team_id, $name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/channels/search_autocomplete');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['name' => 'test-name']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function searchChannelsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SearchChannelsRequest(term: 'test-term');

        $result = $this->endpoint->searchChannels($team_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/channels/search');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function getChannelByNameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $team_id = 'test-team_id';
        $channel_name = 'test-channel_name';
        $include_deleted = true;

        $result = $this->endpoint->getChannelByName($team_id, $channel_name, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/channels/name/test-channel_name');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['include_deleted' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function getChannelByNameForTeamNameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $team_name = 'test-team_name';
        $channel_name = 'test-channel_name';
        $include_deleted = true;

        $result = $this->endpoint->getChannelByNameForTeamName($team_name, $channel_name, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/name/test-team_name/channels/name/test-channel_name');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['include_deleted' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function getChannelMembersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['channel_id' => 'test-channel_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'last_viewed_at' => 1234567890, 'msg_count' => 1234567890, 'mention_count' => 1234567890, 'last_update_at' => 1234567890]]);

        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getChannelMembers($channel_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/members');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelMember::class, $result[0]);
    }

    #[Test]
    public function getChannelMembersByIdsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['channel_id' => 'test-channel_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'last_viewed_at' => 1234567890, 'msg_count' => 1234567890, 'mention_count' => 1234567890, 'last_update_at' => 1234567890]]);

        $channel_id = 'test-channel_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetChannelMembersByIdsRequest(items: []);

        $result = $this->endpoint->getChannelMembersByIds($channel_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/members/ids');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelMember::class, $result[0]);
    }

    #[Test]
    public function getChannelMemberBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['channel_id' => 'test-channel_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'last_viewed_at' => 1234567890, 'msg_count' => 1234567890, 'mention_count' => 1234567890, 'last_update_at' => 1234567890]);

        $channel_id = 'test-channel_id';
        $user_id = 'test-user_id';

        $result = $this->endpoint->getChannelMember($channel_id, $user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/members/test-user_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelMember::class, $result);
    }

    #[Test]
    public function removeUserFromChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $channel_id = 'test-channel_id';
        $user_id = 'test-user_id';

        $result = $this->endpoint->removeUserFromChannel($channel_id, $user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/members/test-user_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateChannelRolesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $channel_id = 'test-channel_id';
        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateChannelRolesRequest(roles: 'test-roles');

        $result = $this->endpoint->updateChannelRoles($channel_id, $user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/members/test-user_id/roles');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateChannelMemberSchemeRolesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $channel_id = 'test-channel_id';
        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateChannelMemberSchemeRolesRequest(scheme_admin: true, scheme_user: true);

        $result = $this->endpoint->updateChannelMemberSchemeRoles($channel_id, $user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/members/test-user_id/schemeRoles');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function viewChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\ViewChannelRequest(channel_id: 'test-channel_id');

        $result = $this->endpoint->viewChannel($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels/members/test-user_id/view');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ViewChannelResponse::class, $result);
    }

    #[Test]
    public function getChannelMembersForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['channel_id' => 'test-channel_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'last_viewed_at' => 1234567890, 'msg_count' => 1234567890, 'mention_count' => 1234567890, 'last_update_at' => 1234567890]]);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';

        $result = $this->endpoint->getChannelMembersForUser($user_id, $team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/channels/members');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelMember::class, $result[0]);
    }

    #[Test]
    public function getChannelsForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $include_deleted = true;
        $last_delete_at = 1;

        $result = $this->endpoint->getChannelsForTeamForUser($user_id, $team_id, $include_deleted, $last_delete_at);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['include_deleted' => '1', 'last_delete_at' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function getChannelsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']]);

        $user_id = 'test-user_id';
        $last_delete_at = 1;
        $include_deleted = true;

        $result = $this->endpoint->getChannelsForUser($user_id, $last_delete_at, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/channels');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['last_delete_at' => '1', 'include_deleted' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result[0]);
    }

    #[Test]
    public function getChannelUnreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'msg_count' => 1234567890, 'mention_count' => 1234567890]);

        $user_id = 'test-user_id';
        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getChannelUnread($user_id, $channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/channels/test-channel_id/unread');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelUnread::class, $result);
    }

    #[Test]
    public function updateChannelSchemeBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $channel_id = 'test-channel_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateChannelSchemeRequest(scheme_id: 'test-scheme_id');

        $result = $this->endpoint->updateChannelScheme($channel_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/scheme');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function channelMembersMinusGroupMembersBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $channel_id = 'test-channel_id';
        $group_ids = 'test-group_ids';
        $page = 1;
        $per_page = 1;

        $this->endpoint->channelMembersMinusGroupMembers($channel_id, $group_ids, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/members_minus_group_members');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['group_ids' => 'test-group_ids', 'page' => '1', 'per_page' => '1']);
    }

    #[Test]
    public function getChannelModerationsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['name' => 'test-name']]);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getChannelModerations($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/moderations');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelModeration::class, $result[0]);
    }

    #[Test]
    public function getSidebarCategoriesForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['order' => [], 'categories' => []]]);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';

        $result = $this->endpoint->getSidebarCategoriesForTeamForUser($team_id, $user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/channels/categories');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OrderedSidebarCategories::class, $result[0]);
    }

    #[Test]
    public function updateSidebarCategoriesForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'user_id' => 'test-user_id', 'team_id' => 'test-team_id', 'display_name' => 'test-display_name', 'type' => 'test-type']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateSidebarCategoriesForTeamForUserRequest(items: []);

        $result = $this->endpoint->updateSidebarCategoriesForTeamForUser($team_id, $user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/channels/categories');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SidebarCategory::class, $result);
    }

    #[Test]
    public function getSidebarCategoryForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'user_id' => 'test-user_id', 'team_id' => 'test-team_id', 'display_name' => 'test-display_name', 'type' => 'test-type']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';
        $category_id = 'test-category_id';

        $result = $this->endpoint->getSidebarCategoryForTeamForUser($team_id, $user_id, $category_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/channels/categories/test-category_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SidebarCategory::class, $result);
    }

    #[Test]
    public function removeSidebarCategoryForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'user_id' => 'test-user_id', 'team_id' => 'test-team_id', 'display_name' => 'test-display_name', 'type' => 'test-type']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';
        $category_id = 'test-category_id';

        $result = $this->endpoint->removeSidebarCategoryForTeamForUser($team_id, $user_id, $category_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/channels/categories/test-category_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SidebarCategory::class, $result);
    }

    #[Test]
    public function getGroupMessageMembersCommonTeamsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'display_name' => 'test-display_name', 'name' => 'test-name', 'description' => 'test-description', 'email' => 'test-email', 'type' => 'test-type', 'allowed_domains' => 'test-allowed_domains', 'invite_id' => 'test-invite_id', 'allow_open_invite' => true, 'policy_id' => 'test-policy_id']]);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getGroupMessageMembersCommonTeams($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/common_teams');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Team::class, $result[0]);
    }
}
