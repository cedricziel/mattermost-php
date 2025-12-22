<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\WebhooksEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreateIncomingWebhookRequest;
use CedricZiel\MattermostPhp\Client\Model\CreateOutgoingWebhookRequest;
use CedricZiel\MattermostPhp\Client\Model\IncomingWebhook;
use CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\UpdateIncomingWebhookRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateOutgoingWebhookRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(WebhooksEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(IncomingWebhook::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(OutgoingWebhook::class)]
class WebhooksEndpointTest extends ClientTestCase
{
    public WebhooksEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new WebhooksEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function createIncomingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'channel_id' => 'test-channel_id', 'description' => 'test-description', 'display_name' => 'test-display_name']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateIncomingWebhookRequest(channel_id: 'test-channel_id');

        $result = $this->endpoint->createIncomingWebhook($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/hooks/incoming');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\IncomingWebhook::class, $result);
    }

    #[Test]
    public function getIncomingWebhooksBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'channel_id' => 'test-channel_id', 'description' => 'test-description', 'display_name' => 'test-display_name']]);

        $page = 1;
        $per_page = 1;
        $team_id = 'test-team_id';
        $include_total_count = true;

        $result = $this->endpoint->getIncomingWebhooks($page, $per_page, $team_id, $include_total_count);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/hooks/incoming');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'team_id' => 'test-team_id', 'include_total_count' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\IncomingWebhook::class, $result[0]);
    }

    #[Test]
    public function getIncomingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'channel_id' => 'test-channel_id', 'description' => 'test-description', 'display_name' => 'test-display_name']);

        $hook_id = 'test-hook_id';

        $result = $this->endpoint->getIncomingWebhook($hook_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/hooks/incoming/test-hook_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\IncomingWebhook::class, $result);
    }

    #[Test]
    public function deleteIncomingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $hook_id = 'test-hook_id';

        $result = $this->endpoint->deleteIncomingWebhook($hook_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/hooks/incoming/test-hook_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateIncomingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'channel_id' => 'test-channel_id', 'description' => 'test-description', 'display_name' => 'test-display_name']);

        $hook_id = 'test-hook_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateIncomingWebhookRequest(id: 'test-id', channel_id: 'test-channel_id', display_name: 'test-display_name', description: 'test-description');

        $result = $this->endpoint->updateIncomingWebhook($hook_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/hooks/incoming/test-hook_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\IncomingWebhook::class, $result);
    }

    #[Test]
    public function createOutgoingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'creator_id' => 'test-creator_id', 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'description' => 'test-description', 'display_name' => 'test-display_name', 'trigger_words' => [], 'trigger_when' => 1234567890, 'callback_urls' => [], 'content_type' => 'test-content_type']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateOutgoingWebhookRequest(team_id: 'test-team_id', display_name: 'test-display_name', trigger_words: [], callback_urls: []);

        $result = $this->endpoint->createOutgoingWebhook($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/hooks/outgoing');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook::class, $result);
    }

    #[Test]
    public function getOutgoingWebhooksBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'creator_id' => 'test-creator_id', 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'description' => 'test-description', 'display_name' => 'test-display_name', 'trigger_words' => [], 'trigger_when' => 1234567890, 'callback_urls' => [], 'content_type' => 'test-content_type']]);

        $page = 1;
        $per_page = 1;
        $team_id = 'test-team_id';
        $channel_id = 'test-channel_id';

        $result = $this->endpoint->getOutgoingWebhooks($page, $per_page, $team_id, $channel_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/hooks/outgoing');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook::class, $result[0]);
    }

    #[Test]
    public function getOutgoingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'creator_id' => 'test-creator_id', 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'description' => 'test-description', 'display_name' => 'test-display_name', 'trigger_words' => [], 'trigger_when' => 1234567890, 'callback_urls' => [], 'content_type' => 'test-content_type']);

        $hook_id = 'test-hook_id';

        $result = $this->endpoint->getOutgoingWebhook($hook_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/hooks/outgoing/test-hook_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook::class, $result);
    }

    #[Test]
    public function deleteOutgoingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $hook_id = 'test-hook_id';

        $result = $this->endpoint->deleteOutgoingWebhook($hook_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/hooks/outgoing/test-hook_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function updateOutgoingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'creator_id' => 'test-creator_id', 'team_id' => 'test-team_id', 'channel_id' => 'test-channel_id', 'description' => 'test-description', 'display_name' => 'test-display_name', 'trigger_words' => [], 'trigger_when' => 1234567890, 'callback_urls' => [], 'content_type' => 'test-content_type']);

        $hook_id = 'test-hook_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateOutgoingWebhookRequest(id: 'test-id', channel_id: 'test-channel_id', display_name: 'test-display_name', description: 'test-description');

        $result = $this->endpoint->updateOutgoingWebhook($hook_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/hooks/outgoing/test-hook_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook::class, $result);
    }

    #[Test]
    public function regenOutgoingHookTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $hook_id = 'test-hook_id';

        $result = $this->endpoint->regenOutgoingHookToken($hook_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/hooks/outgoing/test-hook_id/regen_token');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
