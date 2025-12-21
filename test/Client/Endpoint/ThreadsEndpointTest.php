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
        $this->assertRequestQueryParams(['since' => '1', 'page' => '1', 'per_page' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UserThreads::class, $result);
    }
}
