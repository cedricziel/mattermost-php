<?php

namespace CedricZiel\MattermostPhp\Client;

class BotsEndpoint
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
     * Convert a user into a bot
     */
    public function convertUserToBot(
        /** User GUID */
        string $user_id,
    ): array
    {
        $path = '/api/v4/users/{user_id}/convert_to_bot';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Create a bot
     */
    public function createBot(): array
    {
        $path = '/api/v4/bots';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * Get bots
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
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['page'] = $page;
        $queryParameters['per_page'] = $per_page;
        $queryParameters['include_deleted'] = $include_deleted;
        $queryParameters['only_orphaned'] = $only_orphaned;
        return [];
    }

    /**
     * Patch a bot
     */
    public function patchBot(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['bot_user_id'] = $bot_user_id;
        return [];
    }

    /**
     * Get a bot
     */
    public function getBot(
        /** Bot user ID */
        string $bot_user_id,
        /** If deleted bots should be returned. */
        ?bool $include_deleted,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['bot_user_id'] = $bot_user_id;
        $queryParameters['include_deleted'] = $include_deleted;
        return [];
    }

    /**
     * Disable a bot
     */
    public function disableBot(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/disable';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['bot_user_id'] = $bot_user_id;
        return [];
    }

    /**
     * Enable a bot
     */
    public function enableBot(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/enable';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['bot_user_id'] = $bot_user_id;
        return [];
    }

    /**
     * Assign a bot to a user
     */
    public function assignBot(
        /** Bot user ID */
        string $bot_user_id,
        /** The user ID to assign the bot to. */
        string $user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/assign/{user_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['bot_user_id'] = $bot_user_id;
        $pathParameters['user_id'] = $user_id;
        return [];
    }

    /**
     * Get bot's LHS icon
     */
    public function getBotIconImage(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/icon';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['bot_user_id'] = $bot_user_id;
        return [];
    }

    /**
     * Set bot's LHS icon image
     */
    public function setBotIconImage(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/icon';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['bot_user_id'] = $bot_user_id;
        return [];
    }

    /**
     * Delete bot's LHS icon image
     */
    public function deleteBotIconImage(
        /** Bot user ID */
        string $bot_user_id,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/icon';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['bot_user_id'] = $bot_user_id;
        return [];
    }

    /**
     * Convert a bot into a user
     */
    public function convertBotToUser(
        /** Bot user ID */
        string $bot_user_id,
        /** Whether to give the user the system admin role. */
        ?bool $set_system_admin = false,
    ): array
    {
        $path = '/api/v4/bots/{bot_user_id}/convert_to_user';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['bot_user_id'] = $bot_user_id;
        $queryParameters['set_system_admin'] = $set_system_admin;
        return [];
    }
}
;