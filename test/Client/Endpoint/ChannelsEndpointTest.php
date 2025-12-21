<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ChannelsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Channel;
use CedricZiel\MattermostPhp\Client\Model\ChannelListWithTeamData;
use CedricZiel\MattermostPhp\Client\Model\ChannelMember;
use CedricZiel\MattermostPhp\Client\Model\ChannelStats;
use CedricZiel\MattermostPhp\Client\Model\ChannelUnread;
use CedricZiel\MattermostPhp\Client\Model\PostList;
use CedricZiel\MattermostPhp\Client\Model\SidebarCategory;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ChannelsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelListWithTeamData::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Channel::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelStats::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PostList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelMember::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelUnread::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(SidebarCategory::class)]
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelListWithTeamData::class, $result);
    }

    #[Test]
    public function getChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getChannel($channel_id);

        $this->assertNotNull($this->getLastRequest());
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function restoreChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'team_id' => 'test-team_id', 'type' => 'test-type', 'display_name' => 'test-display_name', 'name' => 'test-name', 'header' => 'test-header', 'purpose' => 'test-purpose', 'last_post_at' => 1234567890, 'total_msg_count' => 1234567890, 'extra_update_at' => 1234567890, 'creator_id' => 'test-creator_id']);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->restoreChannel($channel_id);

        $this->assertNotNull($this->getLastRequest());
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostList::class, $result);
    }

    #[Test]
    public function getPublicChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getPublicChannelsForTeam($team_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPrivateChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getPrivateChannelsForTeam($team_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getDeletedChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getDeletedChannelsForTeam($team_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function autocompleteChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $name = 'test-name';

        $result = $this->endpoint->autocompleteChannelsForTeam($team_id, $name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function autocompleteChannelsForTeamForSearchBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $name = 'test-name';

        $result = $this->endpoint->autocompleteChannelsForTeamForSearch($team_id, $name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
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
        $this->assertRequestHasAuthHeader();
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Channel::class, $result);
    }

    #[Test]
    public function getChannelMembersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getChannelMembers($channel_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelMemberBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['channel_id' => 'test-channel_id', 'user_id' => 'test-user_id', 'roles' => 'test-roles', 'last_viewed_at' => 1234567890, 'msg_count' => 1234567890, 'mention_count' => 1234567890, 'notify_props' => 'test-notify_props', 'last_update_at' => 1234567890]);

        $channel_id = 'test-channel_id';
        $user_id = 'test-user_id';

        $result = $this->endpoint->getChannelMember($channel_id, $user_id);

        $this->assertNotNull($this->getLastRequest());
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getChannelMembersForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';

        $result = $this->endpoint->getChannelMembersForUser($user_id, $team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelsForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $include_deleted = true;
        $last_delete_at = 1;

        $result = $this->endpoint->getChannelsForTeamForUser($user_id, $team_id, $include_deleted, $last_delete_at);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';
        $last_delete_at = 1;
        $include_deleted = true;

        $result = $this->endpoint->getChannelsForUser($user_id, $last_delete_at, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelUnreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'msg_count' => 1234567890, 'mention_count' => 1234567890]);

        $user_id = 'test-user_id';
        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getChannelUnread($user_id, $channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelUnread::class, $result);
    }

    #[Test]
    public function getChannelModerationsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getChannelModerations($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getSidebarCategoriesForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';

        $result = $this->endpoint->getSidebarCategoriesForTeamForUser($team_id, $user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\SidebarCategory::class, $result);
    }

    #[Test]
    public function getGroupMessageMembersCommonTeamsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getGroupMessageMembersCommonTeams($channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
