<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\StatusEndpoint;
use CedricZiel\MattermostPhp\Client\Model\GetUsersStatusesByIdsRequest;
use CedricZiel\MattermostPhp\Client\Model\PostUserRecentCustomStatusDeleteRequest;
use CedricZiel\MattermostPhp\Client\Model\RemoveRecentCustomStatusRequest;
use CedricZiel\MattermostPhp\Client\Model\Status;
use CedricZiel\MattermostPhp\Client\Model\UpdateUserCustomStatusRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateUserStatusRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(StatusEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Status::class)]
class StatusEndpointTest extends ClientTestCase
{
    public StatusEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new StatusEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getUserStatusBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'status' => 'test-status', 'manual' => true, 'last_activity_at' => 1234567890]);

        $user_id = 'test-user_id';

        $result = $this->endpoint->getUserStatus($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/status');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Status::class, $result);
    }

    #[Test]
    public function updateUserStatusBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'status' => 'test-status', 'manual' => true, 'last_activity_at' => 1234567890]);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateUserStatusRequest(user_id: 'test-user_id', status: 'test-status');

        $result = $this->endpoint->updateUserStatus($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/status');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Status::class, $result);
    }

    #[Test]
    public function getUsersStatusesByIdsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['user_id' => 'test-user_id', 'status' => 'test-status', 'manual' => true, 'last_activity_at' => 1234567890]]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetUsersStatusesByIdsRequest(items: []);

        $result = $this->endpoint->getUsersStatusesByIds($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/status/ids');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Status::class, $result[0]);
    }

    #[Test]
    public function updateUserCustomStatusBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateUserCustomStatusRequest(emoji: 'test-emoji', text: 'test-text');

        $this->endpoint->updateUserCustomStatus($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/users/test-user_id/status/custom');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function unsetUserCustomStatusBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';

        $this->endpoint->unsetUserCustomStatus($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/users/test-user_id/status/custom');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function removeRecentCustomStatusBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\RemoveRecentCustomStatusRequest(emoji: 'test-emoji', text: 'test-text', duration: 'test-duration', expires_at: 'test-expires_at');

        $this->endpoint->removeRecentCustomStatus($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/users/test-user_id/status/custom/recent');
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function postUserRecentCustomStatusDeleteBuildsCorrectRequest(): void
    {
        $this->mockEmptyResponse(200);

        $user_id = 'test-user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\PostUserRecentCustomStatusDeleteRequest(emoji: 'test-emoji', text: 'test-text', duration: 'test-duration', expires_at: 'test-expires_at');

        $this->endpoint->postUserRecentCustomStatusDelete($user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/status/custom/recent/delete');
        $this->assertRequestHasAuthHeader();
    }
}
