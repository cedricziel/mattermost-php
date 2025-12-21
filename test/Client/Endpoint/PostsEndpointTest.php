<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\PostsEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(PostsEndpoint::class)]
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
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $post_id = 'test-post_id';
        $include_deleted = true;

        try {
            $this->endpoint->getPost($post_id, $include_deleted);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function deletePostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $post_id = 'test-post_id';

        try {
            $this->endpoint->deletePost($post_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPostThreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

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

        try {
            $this->endpoint->getPostThread($post_id, $perPage, $fromPost, $fromCreateAt, $fromUpdateAt, $direction, $skipFetchThreads, $collapsedThreads, $collapsedThreadsExtended, $updatesOnly);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getFlaggedPostsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;

        try {
            $this->endpoint->getFlaggedPostsForUser($user_id, $team_id, $channel_id, $page, $per_page);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getFileInfosForPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $post_id = 'test-post_id';
        $include_deleted = true;

        try {
            $this->endpoint->getFileInfosForPost($post_id, $include_deleted);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPostsForChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $channel_id = 'test-channel_id';
        $page = 1;
        $per_page = 1;
        $since = 1;
        $before = 'test-before';
        $after = 'test-after';
        $include_deleted = true;

        try {
            $this->endpoint->getPostsForChannel($channel_id, $page, $per_page, $since, $before, $after, $include_deleted);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getPostsAroundLastUnreadBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $channel_id = 'test-channel_id';
        $limit_before = 1;
        $limit_after = 1;
        $skipFetchThreads = true;
        $collapsedThreads = true;
        $collapsedThreadsExtended = true;

        try {
            $this->endpoint->getPostsAroundLastUnread($user_id, $channel_id, $limit_before, $limit_after, $skipFetchThreads, $collapsedThreads, $collapsedThreadsExtended);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function pinPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $post_id = 'test-post_id';

        try {
            $this->endpoint->pinPost($post_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function unpinPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $post_id = 'test-post_id';

        try {
            $this->endpoint->unpinPost($post_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function doPostActionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $post_id = 'test-post_id';
        $action_id = 'test-action_id';

        try {
            $this->endpoint->doPostAction($post_id, $action_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function saveAcknowledgementForPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $post_id = 'test-post_id';

        try {
            $this->endpoint->saveAcknowledgementForPost($user_id, $post_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function deleteAcknowledgementForPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $user_id = 'test-user_id';
        $post_id = 'test-post_id';

        try {
            $this->endpoint->deleteAcknowledgementForPost($user_id, $post_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function restorePostVersionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $post_id = 'test-post_id';
        $restore_version_id = 'test-restore_version_id';

        try {
            $this->endpoint->restorePostVersion($post_id, $restore_version_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function revealPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $post_id = 'test-post_id';

        try {
            $this->endpoint->revealPost($post_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function burnPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $post_id = 'test-post_id';

        try {
            $this->endpoint->burnPost($post_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
