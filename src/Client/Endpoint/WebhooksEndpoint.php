<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class WebhooksEndpoint
{
    use \CedricZiel\MattermostPhp\Client\HttpClientTrait;

    public function __construct(
        protected string $baseUrl,
        ?\Psr\Http\Client\ClientInterface $httpClient = null,
        ?\Psr\Http\Message\RequestFactoryInterface $requestFactory = null,
    ) {
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     * Create an incoming webhook
     * Create an incoming webhook for a channel.
     * ##### Permissions
     * `manage_webhooks` for the team the webhook is in.
     *
     * `manage_others_incoming_webhooks` for the team the webhook is in if the user is different than the requester.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createIncomingWebhook(\CreateIncomingWebhookRequest $requestBody): array
    {
        $path = '/api/v4/hooks/incoming';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * List incoming webhooks
     * Get a page of a list of incoming webhooks. Optionally filter for a specific team using query parameters.
     * ##### Permissions
     * `manage_webhooks` for the system or `manage_webhooks` for the specific team.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get an incoming webhook
     * Get an incoming webhook given the hook id.
     * ##### Permissions
     * `manage_webhooks` for system or `manage_webhooks` for the specific team or `manage_webhooks` for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getIncomingWebhook(
        /** Incoming Webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/incoming/{hook_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Delete an incoming webhook
     * Delete an incoming webhook given the hook id.
     * ##### Permissions
     * `manage_webhooks` for system or `manage_webhooks` for the specific team or `manage_webhooks` for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteIncomingWebhook(
        /** Incoming webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/incoming/{hook_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Update an incoming webhook
     * Update an incoming webhook given the hook id.
     * ##### Permissions
     * `manage_webhooks` for system or `manage_webhooks` for the specific team or `manage_webhooks` for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateIncomingWebhook(
        /** Incoming Webhook GUID */
        string $hook_id,
        \UpdateIncomingWebhookRequest $requestBody,
    ): array
    {
        $path = '/api/v4/hooks/incoming/{hook_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Create an outgoing webhook
     * Create an outgoing webhook for a team.
     * ##### Permissions
     * `manage_webhooks` for the team the webhook is in.
     *
     * `manage_others_outgoing_webhooks` for the team the webhook is in if the user is different than the requester.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createOutgoingWebhook(\CreateOutgoingWebhookRequest $requestBody): array
    {
        $path = '/api/v4/hooks/outgoing';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * List outgoing webhooks
     * Get a page of a list of outgoing webhooks. Optionally filter for a specific team or channel using query parameters.
     * ##### Permissions
     * `manage_webhooks` for the system or `manage_webhooks` for the specific team/channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
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
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['team_id'] = $team_id;
        $queryParameters['channel_id'] = $channel_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get an outgoing webhook
     * Get an outgoing webhook given the hook id.
     * ##### Permissions
     * `manage_webhooks` for system or `manage_webhooks` for the specific team or `manage_webhooks` for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getOutgoingWebhook(
        /** Outgoing webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Delete an outgoing webhook
     * Delete an outgoing webhook given the hook id.
     * ##### Permissions
     * `manage_webhooks` for system or `manage_webhooks` for the specific team or `manage_webhooks` for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteOutgoingWebhook(
        /** Outgoing webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Update an outgoing webhook
     * Update an outgoing webhook given the hook id.
     * ##### Permissions
     * `manage_webhooks` for system or `manage_webhooks` for the specific team or `manage_webhooks` for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateOutgoingWebhook(
        /** outgoing Webhook GUID */
        string $hook_id,
        \UpdateOutgoingWebhookRequest $requestBody,
    ): array
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Regenerate the token for the outgoing webhook.
     * Regenerate the token for the outgoing webhook.
     * ##### Permissions
     * `manage_webhooks` for system or `manage_webhooks` for the specific team or `manage_webhooks` for the channel.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function regenOutgoingHookToken(
        /** Outgoing webhook GUID */
        string $hook_id,
    ): array
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}/regen_token';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
