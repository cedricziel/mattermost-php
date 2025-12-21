<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PostsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Post;
use CedricZiel\MattermostPhp\Client\Model\PostAcknowledgement;
use CedricZiel\MattermostPhp\Client\Model\PostList;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PostsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Post::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PostList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PostAcknowledgement::class)]
class PostsEndpointTest extends ClientTestCase
{
    public PostsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new PostsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id', 'metadata' => 'test-metadata']);

        $post_id = 'test-post_id';
        $include_deleted = true;

        $result = $this->endpoint->getPost($post_id, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $result);
    }

    #[Test]
    public function deletePostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $post_id = 'test-post_id';

        $result = $this->endpoint->deletePost($post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getPostThreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['order' => [], 'next_post_id' => 'test-next_post_id', 'prev_post_id' => 'test-prev_post_id', 'has_next' => true]);

        $post_id = 'test-post_id';
        $perPage = 1;
        $fromPost = 'test-fromPost';
        $fromCreateAt = 1;
        $fromUpdateAt = 1;
        $direction = 'test-direction';
        $skipFetchThreads = true;
        $collapsedThreads = true;
        $collapsedThreadsExtended = true;
        $updatesOnly = true;

        $result = $this->endpoint->getPostThread($post_id, $perPage, $fromPost, $fromCreateAt, $fromUpdateAt, $direction, $skipFetchThreads, $collapsedThreads, $collapsedThreadsExtended, $updatesOnly);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostList::class, $result);
    }

    #[Test]
    public function getFlaggedPostsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getFlaggedPostsForUser($user_id, $team_id, $channel_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getFileInfosForPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $post_id = 'test-post_id';
        $include_deleted = true;

        $result = $this->endpoint->getFileInfosForPost($post_id, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPostsForChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['order' => [], 'next_post_id' => 'test-next_post_id', 'prev_post_id' => 'test-prev_post_id', 'has_next' => true]);

        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;
        $since = 1;
        $before = 'test-before';
        $after = 'test-after';
        $include_deleted = true;

        $result = $this->endpoint->getPostsForChannel($channel_id, $page, $per_page, $since, $before, $after, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostList::class, $result);
    }

    #[Test]
    public function getPostsAroundLastUnreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['order' => [], 'next_post_id' => 'test-next_post_id', 'prev_post_id' => 'test-prev_post_id', 'has_next' => true]);

        $user_id = 'test-user_id';
        $channel_id = 'test-channel_id';
        $limit_before = 1;
        $limit_after = 1;
        $skipFetchThreads = true;
        $collapsedThreads = true;
        $collapsedThreadsExtended = true;

        $result = $this->endpoint->getPostsAroundLastUnread($user_id, $channel_id, $limit_before, $limit_after, $skipFetchThreads, $collapsedThreads, $collapsedThreadsExtended);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostList::class, $result);
    }

    #[Test]
    public function pinPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $post_id = 'test-post_id';

        $result = $this->endpoint->pinPost($post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function unpinPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $post_id = 'test-post_id';

        $result = $this->endpoint->unpinPost($post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function doPostActionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $post_id = 'test-post_id';
        $action_id = 'test-action_id';

        $result = $this->endpoint->doPostAction($post_id, $action_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function saveAcknowledgementForPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'post_id' => 'test-post_id', 'acknowledged_at' => 1234567890]);

        $user_id = 'test-user_id';
        $post_id = 'test-post_id';

        $result = $this->endpoint->saveAcknowledgementForPost($user_id, $post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostAcknowledgement::class, $result);
    }

    #[Test]
    public function deleteAcknowledgementForPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $post_id = 'test-post_id';

        $result = $this->endpoint->deleteAcknowledgementForPost($user_id, $post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function restorePostVersionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id', 'metadata' => 'test-metadata']);

        $post_id = 'test-post_id';
        $restore_version_id = 'test-restore_version_id';

        $result = $this->endpoint->restorePostVersion($post_id, $restore_version_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $result);
    }

    #[Test]
    public function revealPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id', 'metadata' => 'test-metadata']);

        $post_id = 'test-post_id';

        $result = $this->endpoint->revealPost($post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $result);
    }

    #[Test]
    public function burnPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $post_id = 'test-post_id';

        $result = $this->endpoint->burnPost($post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
