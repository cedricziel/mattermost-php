<?php

namespace CedricZiel\MattermostPhp\Client;

class CommandsEndpoint
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
     * Create a command
     */
    public function createCommand(): array
    {
        $path = '/api/v4/commands';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }

    /**
     * List commands for a team
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
        $pathParameters = [];
        $queryParameters = [];
        $queryParameters['team_id'] = $team_id;
        $queryParameters['custom_only'] = $custom_only;
        return [];
    }

    /**
     * List autocomplete commands
     */
    public function listAutocompleteCommands(
        /** Team GUID */
        string $team_id,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/commands/autocomplete';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        return [];
    }

    /**
     * List commands' autocomplete data
     */
    public function listCommandAutocompleteSuggestions(
        /** Team GUID */
        string $team_id,
        /** String inputted by the user. */
        string $user_input,
    ): array
    {
        $path = '/api/v4/teams/{team_id}/commands/autocomplete_suggestions';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['team_id'] = $team_id;
        $queryParameters['user_input'] = $user_input;
        return [];
    }

    /**
     * Get a command
     */
    public function getCommandById(
        /** ID of the command to get */
        string $command_id,
    ): array
    {
        $path = '/api/v4/commands/{command_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['command_id'] = $command_id;
        return [];
    }

    /**
     * Update a command
     */
    public function updateCommand(
        /** ID of the command to update */
        string $command_id,
    ): array
    {
        $path = '/api/v4/commands/{command_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['command_id'] = $command_id;
        return [];
    }

    /**
     * Delete a command
     */
    public function deleteCommand(
        /** ID of the command to delete */
        string $command_id,
    ): array
    {
        $path = '/api/v4/commands/{command_id}';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['command_id'] = $command_id;
        return [];
    }

    /**
     * Move a command
     */
    public function moveCommand(
        /** ID of the command to move */
        string $command_id,
    ): array
    {
        $path = '/api/v4/commands/{command_id}/move';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['command_id'] = $command_id;
        return [];
    }

    /**
     * Generate a new token
     */
    public function regenCommandToken(
        /** ID of the command to generate the new token */
        string $command_id,
    ): array
    {
        $path = '/api/v4/commands/{command_id}/regen_token';
        $pathParameters = [];
        $queryParameters = [];
        $pathParameters['command_id'] = $command_id;
        return [];
    }

    /**
     * Execute a command
     */
    public function executeCommand(): array
    {
        $path = '/api/v4/commands/execute';
        $pathParameters = [];
        $queryParameters = [];
        return [];
    }
}
;