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
    public function createIncomingWebhook(
        \CedricZiel\MattermostPhp\Client\Model\CreateIncomingWebhookRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\IncomingWebhook|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/hooks/incoming';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\IncomingWebhook::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\GetIncomingWebhooksResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/hooks/incoming';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetIncomingWebhooksResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\IncomingWebhook|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/hooks/incoming/{hook_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\IncomingWebhook::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/hooks/incoming/{hook_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\UpdateIncomingWebhookRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\IncomingWebhook|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/hooks/incoming/{hook_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\IncomingWebhook::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
    public function createOutgoingWebhook(
        \CedricZiel\MattermostPhp\Client\Model\CreateOutgoingWebhookRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/hooks/outgoing';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\GetOutgoingWebhooksResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
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
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetOutgoingWebhooksResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\UpdateOutgoingWebhookRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\OutgoingWebhook::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\StatusOK|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/hooks/outgoing/{hook_id}/regen_token';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['hook_id'] = $hook_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\StatusOK::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
    }
}
