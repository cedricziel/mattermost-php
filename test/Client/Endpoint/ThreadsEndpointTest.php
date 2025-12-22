<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ThreadsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\UserThreads;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ThreadsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UserThreads::class)]
class ThreadsEndpointTest extends ClientTestCase
{
    public ThreadsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ThreadsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getUserThreadsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['total' => 1234567890, 'threads' => []]);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $since = 1;
        $deleted = true;
        $extended = true;
        $page = 1;
        $per_page = 1;
        $totalsOnly = true;
        $threadsOnly = true;

        $result = $this->endpoint->getUserThreads($user_id, $team_id, $since, $deleted, $extended, $page, $per_page, $totalsOnly, $threadsOnly);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/threads');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['since' => '1', 'deleted' => '1', 'extended' => '1', 'page' => '1', 'per_page' => '1', 'totalsOnly' => '1', 'threadsOnly' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserThreads::class, $result);
    }

    #[Test]
    public function getThreadMentionCountsByChannelBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';

        $this->endpoint->getThreadMentionCountsByChannel($user_id, $team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/threads/mention_counts');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function updateThreadsReadForUserBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';

        $this->endpoint->updateThreadsReadForUser($user_id, $team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/threads/read');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function updateThreadReadForUserBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $thread_id = 'test-thread_id';
        $timestamp = 'test-timestamp';

        $this->endpoint->updateThreadReadForUser($user_id, $team_id, $thread_id, $timestamp);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/threads/test-thread_id/read/test-timestamp');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function startFollowingThreadBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $thread_id = 'test-thread_id';

        $this->endpoint->startFollowingThread($user_id, $team_id, $thread_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/threads/test-thread_id/following');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function stopFollowingThreadBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $thread_id = 'test-thread_id';

        $this->endpoint->stopFollowingThread($user_id, $team_id, $thread_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/threads/test-thread_id/following');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getUserThreadBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $team_id = 'test-team_id';
        $thread_id = 'test-thread_id';

        $this->endpoint->getUserThread($user_id, $team_id, $thread_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/teams/test-team_id/threads/test-thread_id');
        $this->assertRequestHasAuthHeader();
    }
}
