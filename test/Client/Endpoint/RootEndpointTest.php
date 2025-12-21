<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\RootEndpoint;
use CedricZiel\MattermostPhp\Client\Model\PushNotification;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(RootEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(PushNotification::class)]
class RootEndpointTest extends ClientTestCase
{
    public RootEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new RootEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function acknowledgeNotificationBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['ack_id' => 'test-ack_id', 'platform' => 'test-platform', 'server_id' => 'test-server_id', 'device_id' => 'test-device_id', 'post_id' => 'test-post_id', 'category' => 'test-category', 'sound' => 'test-sound', 'message' => 'test-message', 'badge' => 1234567890, 'cont_ava' => 1234567890, 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'root_id' => 'test-root_id', 'channel_name' => 'test-channel_name', 'type' => 'test-type', 'sender_id' => 'test-sender_id', 'sender_name' => 'test-sender_name', 'override_username' => 'test-override_username', 'override_icon_url' => 'test-override_icon_url', 'from_webhook' => 'test-from_webhook', 'version' => 'test-version', 'is_id_loaded' => true]);

        $result = $this->endpoint->acknowledgeNotification();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/notifications/ack');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\PushNotification::class, $result);
    }
}
