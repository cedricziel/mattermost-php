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
    public function createCommand(
        \CedricZiel\MattermostPhp\Client\Model\CreateCommandRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\CreateCommandResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/commands';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[201] = \CedricZiel\MattermostPhp\Client\Model\CreateCommandResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\ListCommandsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/commands';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $queryParameters['team_id'] = $team_id;
        $queryParameters['custom_only'] = $custom_only;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ListCommandsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\ListAutocompleteCommandsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/teams/{team_id}/commands/autocomplete';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ListAutocompleteCommandsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\ListCommandAutocompleteSuggestionsResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/teams/{team_id}/commands/autocomplete_suggestions';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['team_id'] = $team_id;
        $queryParameters['user_input'] = $user_input;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ListCommandAutocompleteSuggestionsResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\GetCommandByIdResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/commands/{command_id}';
        $method = 'get';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\GetCommandByIdResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\UpdateCommandRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\UpdateCommandResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/commands/{command_id}';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\UpdateCommandResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\DeleteCommandResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/commands/{command_id}';
        $method = 'delete';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\DeleteCommandResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
        \CedricZiel\MattermostPhp\Client\Model\MoveCommandRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\MoveCommandResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse
    {
        $path = '/api/v4/commands/{command_id}/move';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\MoveCommandResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[404] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotFoundResponse::class;

        return $this->mapResponse($response, $map);
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
    ): \CedricZiel\MattermostPhp\Client\Model\RegenCommandTokenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse
    {
        $path = '/api/v4/commands/{command_id}/regen_token';
        $method = 'put';
        $pathParameters = [];
        $queryParameters = [];

        $pathParameters['command_id'] = $command_id;

        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\RegenCommandTokenResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;

        return $this->mapResponse($response, $map);
    }

    /**
     * Execute a command
     * Execute a command on a team.
     * ##### Permissions
     * Must have `use_slash_commands` permission for the team the command is in.
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function executeCommand(
        \CedricZiel\MattermostPhp\Client\Model\ExecuteCommandRequest $requestBody,
    ): \CedricZiel\MattermostPhp\Client\Model\ExecuteCommandResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse|\CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse
    {
        $path = '/api/v4/commands/execute';
        $method = 'post';
        $pathParameters = [];
        $queryParameters = [];


        // build URI through path and query parameters
        $uri = $this->buildUri($path, $pathParameters, $queryParameters);

        $request = $this->requestFactory->createRequest($method, $uri);

        $response = $this->httpClient->sendRequest($request);

        $map = [];
        $map[200] = \CedricZiel\MattermostPhp\Client\Model\ExecuteCommandResponse::class;
        $map[400] = \CedricZiel\MattermostPhp\Client\Model\DefaultBadRequestResponse::class;
        $map[401] = \CedricZiel\MattermostPhp\Client\Model\DefaultUnauthorizedResponse::class;
        $map[403] = \CedricZiel\MattermostPhp\Client\Model\DefaultForbiddenResponse::class;
        $map[501] = \CedricZiel\MattermostPhp\Client\Model\DefaultNotImplementedResponse::class;

        return $this->mapResponse($response, $map);
    }
}
