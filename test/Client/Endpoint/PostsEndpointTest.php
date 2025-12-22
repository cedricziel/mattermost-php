<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PostsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreatePostEphemeralRequest;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;
use CedricZiel\MattermostPhp\Client\Model\GetPostsByIdsRequest;
use CedricZiel\MattermostPhp\Client\Model\MoveThreadRequest;
use CedricZiel\MattermostPhp\Client\Model\Post;
use CedricZiel\MattermostPhp\Client\Model\PostAcknowledgement;
use CedricZiel\MattermostPhp\Client\Model\PostList;
use CedricZiel\MattermostPhp\Client\Model\PostListWithSearchMatches;
use CedricZiel\MattermostPhp\Client\Model\RewriteMessageRequest;
use CedricZiel\MattermostPhp\Client\Model\RewriteMessageResponse;
use CedricZiel\MattermostPhp\Client\Model\SearchPostsRequest;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\UpdatePostRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PostsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Post::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PostList::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PostListWithSearchMatches::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PostAcknowledgement::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(RewriteMessageResponse::class)]
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
    public function createPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreatePostRequest(channel_id: 'test-channel_id', message: 'test-message');
        $set_online = true;

        $result = $this->endpoint->createPost($requestBody, $set_online);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['set_online' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $result);
    }

    #[Test]
    public function createPostEphemeralBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreatePostEphemeralRequest(user_id: 'test-user_id', post: new \stdClass());

        $result = $this->endpoint->createPostEphemeral($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts/ephemeral');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $result);
    }

    #[Test]
    public function getPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id']);

        $post_id = 'test-post_id';
        $include_deleted = true;

        $result = $this->endpoint->getPost($post_id, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/posts/test-post_id');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['include_deleted' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $result);
    }

    #[Test]
    public function deletePostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $post_id = 'test-post_id';

        $result = $this->endpoint->deletePost($post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/posts/test-post_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updatePostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id']);

        $post_id = 'test-post_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdatePostRequest(id: 'test-id');

        $result = $this->endpoint->updatePost($post_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/posts/test-post_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $result);
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/posts/test-post_id/thread');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['perPage' => '1', 'fromPost' => 'test-fromPost', 'fromCreateAt' => '1', 'fromUpdateAt' => '1', 'direction' => 'test-direction', 'skipFetchThreads' => '1', 'collapsedThreads' => '1', 'collapsedThreadsExtended' => '1', 'updatesOnly' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostList::class, $result);
    }

    #[Test]
    public function getFlaggedPostsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['order' => [], 'next_post_id' => 'test-next_post_id', 'prev_post_id' => 'test-prev_post_id', 'has_next' => true]]);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getFlaggedPostsForUser($user_id, $team_id, $channel_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/posts/flagged');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostList::class, $result[0]);
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/posts');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'since' => '1', 'before' => 'test-before', 'after' => 'test-after', 'include_deleted' => '1']);
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
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/channels/test-channel_id/posts/unread');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['limit_before' => '1', 'limit_after' => '1', 'skipFetchThreads' => '1', 'collapsedThreads' => '1', 'collapsedThreadsExtended' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostList::class, $result);
    }

    #[Test]
    public function searchPostsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['order' => []]);

        $team_id = 'test-team_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SearchPostsRequest(terms: 'test-terms', is_or_search: true);

        $result = $this->endpoint->searchPosts($team_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/teams/test-team_id/posts/search');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PostListWithSearchMatches::class, $result);
    }

    #[Test]
    public function pinPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $post_id = 'test-post_id';

        $result = $this->endpoint->pinPost($post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts/test-post_id/pin');
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts/test-post_id/unpin');
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
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts/test-post_id/actions/test-action_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getPostsByIdsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id']]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetPostsByIdsRequest(items: []);

        $result = $this->endpoint->getPostsByIds($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts/ids');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $result[0]);
    }

    #[Test]
    public function saveAcknowledgementForPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'post_id' => 'test-post_id', 'acknowledged_at' => 1234567890]);

        $user_id = 'test-user_id';
        $post_id = 'test-post_id';

        $result = $this->endpoint->saveAcknowledgementForPost($user_id, $post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/posts/test-post_id/ack');
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
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/users/test-user_id/posts/test-post_id/ack');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function moveThreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $post_id = 'test-post_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\MoveThreadRequest(channel_id: 'test-channel_id');

        $result = $this->endpoint->moveThread($post_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts/test-post_id/move');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function restorePostVersionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id']);

        $post_id = 'test-post_id';
        $restore_version_id = 'test-restore_version_id';

        $result = $this->endpoint->restorePostVersion($post_id, $restore_version_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts/test-post_id/restore/test-restore_version_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Post::class, $result);
    }

    #[Test]
    public function revealPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'edit_at' => 1234567890, 'user_id' => 'test-user_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'original_id' => 'test-original_id', 'message' => 'test-message', 'type' => 'test-type', 'hashtag' => 'test-hashtag', 'file_ids' => [], 'pending_post_id' => 'test-pending_post_id']);

        $post_id = 'test-post_id';

        $result = $this->endpoint->revealPost($post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/posts/test-post_id/reveal');
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
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/posts/test-post_id/burn');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function rewriteMessageBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['rewritten_text' => 'test-rewritten_text']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\RewriteMessageRequest(agent_id: 'test-agent_id', message: 'test-message', action: 'test-action');

        $result = $this->endpoint->rewriteMessage($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts/rewrite');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RewriteMessageResponse::class, $result);
    }
}
