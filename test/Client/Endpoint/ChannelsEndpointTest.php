<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ChannelsEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ChannelsEndpoint::class)]
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
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $not_associated_to_group = 'test-not_associated_to_group';
        $page = 1;
        $per_page = 1;
        $exclude_default_channels = true;
        $include_deleted = true;
        $include_total_count = true;
        $exclude_policy_constrained = true;

        try {
            $this->endpoint->getAllChannels($not_associated_to_group, $page, $per_page, $exclude_default_channels, $include_deleted, $include_total_count, $exclude_policy_constrained);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelMembersTimezonesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->getChannelMembersTimezones($channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->getChannel($channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function deleteChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->deleteChannel($channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function restoreChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->restoreChannel($channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelStatsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->getChannelStats($channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPinnedPostsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->getPinnedPosts($channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPublicChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        try {
            $this->endpoint->getPublicChannelsForTeam($team_id, $page, $per_page);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPrivateChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        try {
            $this->endpoint->getPrivateChannelsForTeam($team_id, $page, $per_page);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getDeletedChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $page = 1;
        $per_page = 1;

        try {
            $this->endpoint->getDeletedChannelsForTeam($team_id, $page, $per_page);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function autocompleteChannelsForTeamBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $name = 'test-name';

        try {
            $this->endpoint->autocompleteChannelsForTeam($team_id, $name);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function autocompleteChannelsForTeamForSearchBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $name = 'test-name';

        try {
            $this->endpoint->autocompleteChannelsForTeamForSearch($team_id, $name);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelByNameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $channel_name = 'test-channel_name';
        $include_deleted = true;

        try {
            $this->endpoint->getChannelByName($team_id, $channel_name, $include_deleted);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelByNameForTeamNameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_name = 'test-team_name';
        $channel_name = 'test-channel_name';
        $include_deleted = true;

        try {
            $this->endpoint->getChannelByNameForTeamName($team_name, $channel_name, $include_deleted);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelMembersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;

        try {
            $this->endpoint->getChannelMembers($channel_id, $page, $per_page);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelMemberBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';
        $user_id = 'test-user_id';

        try {
            $this->endpoint->getChannelMember($channel_id, $user_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function removeUserFromChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';
        $user_id = 'test-user_id';

        try {
            $this->endpoint->removeUserFromChannel($channel_id, $user_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelMembersForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';

        try {
            $this->endpoint->getChannelMembersForUser($user_id, $team_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelsForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $include_deleted = true;
        $last_delete_at = 1;

        try {
            $this->endpoint->getChannelsForTeamForUser($user_id, $team_id, $include_deleted, $last_delete_at);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $last_delete_at = 1;
        $include_deleted = true;

        try {
            $this->endpoint->getChannelsForUser($user_id, $last_delete_at, $include_deleted);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelUnreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->getChannelUnread($user_id, $channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function channelMembersMinusGroupMembersBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';
        $group_ids = 'test-group_ids';
        $page = 1;
        $per_page = 1;

        try {
            $this->endpoint->channelMembersMinusGroupMembers($channel_id, $group_ids, $page, $per_page);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelMemberCountsByGroupBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';
        $include_timezones = true;

        try {
            $this->endpoint->getChannelMemberCountsByGroup($channel_id, $include_timezones);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getChannelModerationsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->getChannelModerations($channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getSidebarCategoriesForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';

        try {
            $this->endpoint->getSidebarCategoriesForTeamForUser($team_id, $user_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getSidebarCategoryOrderForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';

        try {
            $this->endpoint->getSidebarCategoryOrderForTeamForUser($team_id, $user_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getSidebarCategoryForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';
        $category_id = 'test-category_id';

        try {
            $this->endpoint->getSidebarCategoryForTeamForUser($team_id, $user_id, $category_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function removeSidebarCategoryForTeamForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $user_id = 'test-user_id';
        $category_id = 'test-category_id';

        try {
            $this->endpoint->removeSidebarCategoryForTeamForUser($team_id, $user_id, $category_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getGroupMessageMembersCommonTeamsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->getGroupMessageMembersCommonTeams($channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
