<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class BotsEndpoint
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
     * Convert a user into a bot
     * Convert a user into a bot.
     *
     * __Minimum server version__: 5.26
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function convertUserToBot(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/convert_to_bot';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Create a bot
     * Create a new bot account on the system. Username is required.
     * ##### Permissions
     * Must have `create_bot` permission.
     * __Minimum server version__: 5.10
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createBot(\CreateBotRequest $requestBody): array
    {
        $path = '/api/v4/bots';
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
     * Get bots
     * Get a page of a list of bots.
     * ##### Permissions
     * Must have `read_bots` permission for bots you are managing, and `read_others_bots` permission for bots others are managing.
     * __Minimum server version__: 5.10
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getBots(
        /** The page to select. */
        ?int $page = 0,
        /** The number of users per page. There is a maximum limit of 200 users per page. */
        ?int $per_page = 60,
        /** If deleted bots should be returned. */
        ?bool $include_deleted,
        /** When true, only orphaned bots will be returned. A bot is consitered orphaned if it's owner has been deactivated. */
        ?bool $only_orphaned,
    ): array
    {
        $path = '/api/v4/bots';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['include_deleted'] = $include_deleted;
        $queryParameters['only_orphaned'] = $only_orphaned;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Patch a bot
     * Partially update a bot by providing only the fields you want to update. Omitted fields will not be updated. The fields that can be updated are defined in the request body, all other provided fields will be ignored.
     * ##### Permissions
     * Must have `manage_bots` permission.
     * __Minimum server version__: 5.10
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function patchBot(
        /** Bot user ID */
        string $bot_user_id,
        \PatchBotRequest $requestBody,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['bot_user_id'] = $bot_user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a bot
     * Get a bot specified by its bot id.
     * ##### Permissions
     * Must have `read_bots` permission for bots you are managing, and `read_others_bots` permission for bots others are managing.
     * __Minimum server version__: 5.10
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getBot(
        /** Bot user ID */
        string $bot_user_id,
        /** If deleted bots should be returned. */
        ?bool $include_deleted,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['bot_user_id'] = $bot_user_id;
        $queryParameters['include_deleted'] = $include_deleted;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Disable a bot
     * Disable a bot.
     * ##### Permissions
     * Must have `manage_bots` permission.
     * __Minimum server version__: 5.10
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function disableBot(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/disable';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['bot_user_id'] = $bot_user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Enable a bot
     * Enable a bot.
     * ##### Permissions
     * Must have `manage_bots` permission.
     * __Minimum server version__: 5.10
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function enableBot(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/enable';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['bot_user_id'] = $bot_user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Assign a bot to a user
     * Assign a bot to a specified user.
     * ##### Permissions
     * Must have `manage_bots` permission.
     * __Minimum server version__: 5.10
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function assignBot(
        /** Bot user ID */
        string $bot_user_id,
        /** The user ID to assign the bot to. */
        string $user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/assign/{user_id}';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['bot_user_id'] = $bot_user_id;
        $pathParameters['user_id'] = $user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get bot's LHS icon
     * Get a bot's LHS icon image based on bot_user_id string parameter.
     * ##### Permissions
     * Must be logged in.
     * __Minimum server version__: 5.14
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getBotIconImage(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/icon';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['bot_user_id'] = $bot_user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Set bot's LHS icon image
     * Set a bot's LHS icon image based on bot_user_id string parameter. Icon image must be SVG format, all other formats are rejected.
     * ##### Permissions
     * Must have `manage_bots` permission.
     * __Minimum server version__: 5.14
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function setBotIconImage(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/icon';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['bot_user_id'] = $bot_user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Delete bot's LHS icon image
     * Delete bot's LHS icon image based on bot_user_id string parameter.
     * ##### Permissions
     * Must have `manage_bots` permission.
     * __Minimum server version__: 5.14
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteBotIconImage(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/icon';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['bot_user_id'] = $bot_user_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Convert a bot into a user
     * Convert a bot into a user.
     *
     * __Minimum server version__: 5.26
     *
     * ##### Permissions
     * Must have `manage_system` permission.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function convertBotToUser(
        /** Bot user ID */
        string $bot_user_id,
        /** Whether to give the user the system admin role. */
        ?bool $set_system_admin = false,
        \ConvertBotToUserRequest $requestBody,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/convert_to_user';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['bot_user_id'] = $bot_user_id;
        $queryParameters['set_system_admin'] = $set_system_admin;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }
}
