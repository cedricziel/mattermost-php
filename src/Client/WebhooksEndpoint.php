<?php

namespace CedricZiel\MattermostPhp\Client;

class WebhooksEndpoint
{
    public function __construct(
        protected string $baseUrl,
        protected \Psr\Http\Client\ClientInterface $httpClient,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Create an incoming webhook
     */
    public function createIncomingWebhook(): array
    {
        $path = '/api/v4/hooks/incoming';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * List incoming webhooks
     */
    public function getIncomingWebhooks(
        /** The page to select. */
        ?int $page = 0,
        /** The number of hooks per page. */
        ?int $per_page = 60,
        /** The ID of the team to get hooks for. */
        ?string $team_id,
    ): array
    {
        $path = '/api/v4/hooks/incoming';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * Get an incoming webhook
     */
    public function getIncomingWebhook(
        /** Incoming Webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/incoming/{hook_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['hook_id'] = $hook_id;
        return [];
    }

    /**
     * Delete an incoming webhook
     */
    public function deleteIncomingWebhook(
        /** Incoming webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/incoming/{hook_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['hook_id'] = $hook_id;
        return [];
    }

    /**
     * Update an incoming webhook
     */
    public function updateIncomingWebhook(
        /** Incoming Webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/incoming/{hook_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['hook_id'] = $hook_id;
        return [];
    }

    /**
     * Create an outgoing webhook
     */
    public function createOutgoingWebhook(): array
    {
        $path = '/api/v4/hooks/outgoing';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * List outgoing webhooks
     */
    public function getOutgoingWebhooks(
        /** The page to select. */
        ?int $page = 0,
        /** The number of hooks per page. */
        ?int $per_page = 60,
        /** The ID of the team to get hooks for. */
        ?string $team_id,
        /** The ID of the channel to get hooks for. */
        ?string $channel_id,
    ): array
    {
        $path = '/api/v4/hooks/outgoing';
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['team_id'] = $team_id;
        $queryParameters['channel_id'] = $channel_id;
        return [];
    }

    /**
     * Get an outgoing webhook
     */
    public function getOutgoingWebhook(
        /** Outgoing webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['hook_id'] = $hook_id;
        return [];
    }

    /**
     * Delete an outgoing webhook
     */
    public function deleteOutgoingWebhook(
        /** Outgoing webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['hook_id'] = $hook_id;
        return [];
    }

    /**
     * Update an outgoing webhook
     */
    public function updateOutgoingWebhook(
        /** outgoing Webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['hook_id'] = $hook_id;
        return [];
    }

    /**
     * Regenerate the token for the outgoing webhook.
     */
    public function regenOutgoingHookToken(
        /** Outgoing webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}/regen_token';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['hook_id'] = $hook_id;
        return [];
    }
}
;