<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\Scheduled_postEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreateScheduledPostRequest;
use CedricZiel\MattermostPhp\Client\Model\CreateScheduledPostResponse;
use CedricZiel\MattermostPhp\Client\Model\DeleteScheduledPostResponse;
use CedricZiel\MattermostPhp\Client\Model\GetUserScheduledPostsResponse;
use CedricZiel\MattermostPhp\Client\Model\UpdateScheduledPostRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateScheduledPostResponse;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(Scheduled_postEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(CreateScheduledPostResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetUserScheduledPostsResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UpdateScheduledPostResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(DeleteScheduledPostResponse::class)]
class Scheduled_postEndpointTest extends ClientTestCase
{
    public Scheduled_postEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new Scheduled_postEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function createScheduledPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateScheduledPostRequest(scheduled_at: 1234567890, channel_id: 'test-channel_id', message: 'test-message');

        $result = $this->endpoint->createScheduledPost($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/posts/schedule');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\CreateScheduledPostResponse::class, $result);
    }

    #[Test]
    public function getUserScheduledPostsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $team_id = 'test-team_id';
        $includeDirectChannels = true;

        $result = $this->endpoint->getUserScheduledPosts($team_id, $includeDirectChannels);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/posts/scheduled/team/test-team_id');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['includeDirectChannels' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetUserScheduledPostsResponse::class, $result);
    }

    #[Test]
    public function updateScheduledPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $scheduled_post_id = 'test-scheduled_post_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateScheduledPostRequest(id: 'test-id', channel_id: 'test-channel_id', user_id: 'test-user_id', scheduled_at: 1234567890, message: 'test-message');

        $result = $this->endpoint->updateScheduledPost($scheduled_post_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/posts/schedule/test-scheduled_post_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UpdateScheduledPostResponse::class, $result);
    }

    #[Test]
    public function deleteScheduledPostBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $scheduled_post_id = 'test-scheduled_post_id';

        $result = $this->endpoint->deleteScheduledPost($scheduled_post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/posts/schedule/test-scheduled_post_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\DeleteScheduledPostResponse::class, $result);
    }
}
