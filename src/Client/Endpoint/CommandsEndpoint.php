<?php

namespace CedricZiel\MattermostPhp\Client\Endpoint;

class CommandsEndpoint
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
     * Create a command
     * Create a command for a team.
     * ##### Permissions
     * `manage_slash_commands` for the team the command is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createCommand(\CreateCommandRequest $requestBody): array
    {
        $path = '/api/v4/commands';
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
     * List commands for a team
     * List commands for a team.
     * ##### Permissions
     * `manage_slash_commands` if need list custom commands.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function listCommands(
        /** The team id. */
        ?string $team_id,
        /**
         * To get only the custom commands. If set to false will get the custom
         * if the user have access plus the system commands, otherwise just the system commands.
         */
        ?bool $custom_only = false,
    ): array
    {
        $path = '/api/v4/commands';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['team_id'] = $team_id;
        $queryParameters['custom_only'] = $custom_only;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * List autocomplete commands
     * List autocomplete commands in the team.
     * ##### Permissions
     * `view_team` for the team.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function listAutocompleteCommands(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/commands/autocomplete';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * List commands' autocomplete data
     * List commands' autocomplete data for the team.
     * ##### Permissions
     * `view_team` for the team.
     * __Minimum server version__: 5.24
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function listCommandAutocompleteSuggestions(
        /** Team GUID */
        string $team_id,
        /** String inputted by the user. */
        string $user_input,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/commands/autocomplete_suggestions';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['user_input'] = $user_input;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Get a command
     * Get a command definition based on command id string.
     * ##### Permissions
     * Must have `manage_slash_commands` permission for the team the command is in.
     *
     * __Minimum server version__: 5.22
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function getCommandById(
        /** ID of the command to get */
        string $command_id,
    ): array
    {
        $path = '/api/v4/commands/{command_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Update a command
     * Update a single command based on command id string and Command struct.
     * ##### Permissions
     * Must have `manage_slash_commands` permission for the team the command is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function updateCommand(
        /** ID of the command to update */
        string $command_id,
        \UpdateCommandRequest $requestBody,
    ): array
    {
        $path = '/api/v4/commands/{command_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Delete a command
     * Delete a command based on command id string.
     * ##### Permissions
     * Must have `manage_slash_commands` permission for the team the command is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deleteCommand(
        /** ID of the command to delete */
        string $command_id,
    ): array
    {
        $path = '/api/v4/commands/{command_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Move a command
     * Move a command to a different team based on command id string.
     * ##### Permissions
     * Must have `manage_slash_commands` permission for the team the command is currently in and the destination team.
     *
     * __Minimum server version__: 5.22
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function moveCommand(
        /** ID of the command to move */
        string $command_id,
        \MoveCommandRequest $requestBody,
    ): array
    {
        $path = '/api/v4/commands/{command_id}/move';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Generate a new token
     * Generate a new token for the command based on command id string.
     * ##### Permissions
     * Must have `manage_slash_commands` permission for the team the command is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function regenCommandToken(
        /** ID of the command to generate the new token */
        string $command_id,
    ): array
    {
        $path = '/api/v4/commands/{command_id}/regen_token';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $path = str_replace(array_map(function ($key) { return sprintf('{%s}', $key); }, array_keys($pathParameters)), array_values($pathParameters), $path);
        $path = sprintf('%s?%s', $path, http_build_query($queryParameters));

        $request = $this->requestFactory->createRequest($method, $this->baseUrl . $path);

        $response = $this->httpClient->sendRequest($request);

        return [];
    }

    /**
     * Execute a command
     * Execute a command on a team.
     * ##### Permissions
     * Must have `use_slash_commands` permission for the team the command is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function executeCommand(\ExecuteCommandRequest $requestBody): array
    {
        $path = '/api/v4/commands/execute';
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
}
