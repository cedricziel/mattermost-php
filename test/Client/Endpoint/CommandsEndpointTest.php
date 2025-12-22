<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\CommandsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\AutocompleteSuggestion;
use CedricZiel\MattermostPhp\Client\Model\Command;
use CedricZiel\MattermostPhp\Client\Model\CommandResponse;
use CedricZiel\MattermostPhp\Client\Model\CreateCommandRequest;
use CedricZiel\MattermostPhp\Client\Model\ExecuteCommandRequest;
use CedricZiel\MattermostPhp\Client\Model\RegenCommandTokenResponse;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(CommandsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Command::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(AutocompleteSuggestion::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(RegenCommandTokenResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(CommandResponse::class)]
class CommandsEndpointTest extends ClientTestCase
{
    public CommandsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new CommandsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function createCommandBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'token' => 'test-token', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'creator_id' => 'test-creator_id', 'team_id' => 'test-team_id', 'trigger' => 'test-trigger', 'method' => 'test-method', 'username' => 'test-username', 'icon_url' => 'test-icon_url', 'auto_complete' => true, 'auto_complete_desc' => 'test-auto_complete_desc', 'auto_complete_hint' => 'test-auto_complete_hint', 'display_name' => 'test-display_name', 'description' => 'test-description', 'url' => 'test-url']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateCommandRequest(team_id: 'test-team_id', method: 'test-method', trigger: 'test-trigger', url: 'test-url');

        $result = $this->endpoint->createCommand($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/commands');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Command::class, $result);
    }

    #[Test]
    public function listCommandsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'token' => 'test-token', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'creator_id' => 'test-creator_id', 'team_id' => 'test-team_id', 'trigger' => 'test-trigger', 'method' => 'test-method', 'username' => 'test-username', 'icon_url' => 'test-icon_url', 'auto_complete' => true, 'auto_complete_desc' => 'test-auto_complete_desc', 'auto_complete_hint' => 'test-auto_complete_hint', 'display_name' => 'test-display_name', 'description' => 'test-description', 'url' => 'test-url']]);

        $team_id = 'test-team_id';
        $custom_only = true;

        $result = $this->endpoint->listCommands($team_id, $custom_only);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/commands');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['team_id' => 'test-team_id', 'custom_only' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Command::class, $result[0]);
    }

    #[Test]
    public function listAutocompleteCommandsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'token' => 'test-token', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'creator_id' => 'test-creator_id', 'team_id' => 'test-team_id', 'trigger' => 'test-trigger', 'method' => 'test-method', 'username' => 'test-username', 'icon_url' => 'test-icon_url', 'auto_complete' => true, 'auto_complete_desc' => 'test-auto_complete_desc', 'auto_complete_hint' => 'test-auto_complete_hint', 'display_name' => 'test-display_name', 'description' => 'test-description', 'url' => 'test-url']]);

        $team_id = 'test-team_id';

        $result = $this->endpoint->listAutocompleteCommands($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/commands/autocomplete');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Command::class, $result[0]);
    }

    #[Test]
    public function listCommandAutocompleteSuggestionsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['Complete' => 'test-Complete', 'Suggestion' => 'test-Suggestion', 'Hint' => 'test-Hint', 'Description' => 'test-Description', 'IconData' => 'test-IconData']]);

        $team_id = 'test-team_id';
        $user_input = 'test-user_input';

        $result = $this->endpoint->listCommandAutocompleteSuggestions($team_id, $user_input);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/teams/test-team_id/commands/autocomplete_suggestions');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['user_input' => 'test-user_input']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\AutocompleteSuggestion::class, $result[0]);
    }

    #[Test]
    public function getCommandByIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'token' => 'test-token', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'creator_id' => 'test-creator_id', 'team_id' => 'test-team_id', 'trigger' => 'test-trigger', 'method' => 'test-method', 'username' => 'test-username', 'icon_url' => 'test-icon_url', 'auto_complete' => true, 'auto_complete_desc' => 'test-auto_complete_desc', 'auto_complete_hint' => 'test-auto_complete_hint', 'display_name' => 'test-display_name', 'description' => 'test-description', 'url' => 'test-url']);

        $command_id = 'test-command_id';

        $result = $this->endpoint->getCommandById($command_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/commands/test-command_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Command::class, $result);
    }

    #[Test]
    public function deleteCommandBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $command_id = 'test-command_id';

        $result = $this->endpoint->deleteCommand($command_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/commands/test-command_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function regenCommandTokenBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['token' => 'test-token']);

        $command_id = 'test-command_id';

        $result = $this->endpoint->regenCommandToken($command_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/commands/test-command_id/regen_token');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RegenCommandTokenResponse::class, $result);
    }

    #[Test]
    public function executeCommandBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['ResponseType' => 'test-ResponseType', 'Text' => 'test-Text', 'Username' => 'test-Username', 'IconURL' => 'test-IconURL', 'GotoLocation' => 'test-GotoLocation', 'Attachments' => []]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\ExecuteCommandRequest(channel_id: 'test-channel_id', command: 'test-command');

        $result = $this->endpoint->executeCommand($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/commands/execute');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\CommandResponse::class, $result);
    }
}
