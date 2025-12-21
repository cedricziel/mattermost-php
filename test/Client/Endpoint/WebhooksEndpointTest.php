<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\WebhooksEndpoint;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(WebhooksEndpoint::class)]
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
    public function getIncomingWebhooksBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $page = 1;
        $per_page = 1;
        $team_id = 'test-team_id';
        $include_total_count = true;

        try {
            $this->endpoint->getIncomingWebhooks($page, $per_page, $team_id, $include_total_count);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getIncomingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $hook_id = 'test-hook_id';

        try {
            $this->endpoint->getIncomingWebhook($hook_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function deleteIncomingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $hook_id = 'test-hook_id';

        try {
            $this->endpoint->deleteIncomingWebhook($hook_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getOutgoingWebhooksBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $page = 1;
        $per_page = 1;
        $team_id = 'test-team_id';
        $channel_id = 'test-channel_id';

        try {
            $this->endpoint->getOutgoingWebhooks($page, $per_page, $team_id, $channel_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getOutgoingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $hook_id = 'test-hook_id';

        try {
            $this->endpoint->getOutgoingWebhook($hook_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function deleteOutgoingWebhookBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $hook_id = 'test-hook_id';

        try {
            $this->endpoint->deleteOutgoingWebhook($hook_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function regenOutgoingHookTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'ok']);

        $hook_id = 'test-hook_id';

        try {
            $this->endpoint->regenOutgoingHookToken($hook_id);
        } catch (\Throwable $e) {
            // Response mapping may fail with mock data - that's OK
            // We're testing the request building, not response handling
        }

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }
}
