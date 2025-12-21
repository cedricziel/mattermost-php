<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\CommandsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Command;
use CedricZiel\MattermostPhp\Client\Model\RegenCommandTokenResponse;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(CommandsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Command::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(RegenCommandTokenResponse::class)]
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
    public function listCommandsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $custom_only = true;

        $result = $this->endpoint->listCommands($team_id, $custom_only);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function listAutocompleteCommandsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';

        $result = $this->endpoint->listAutocompleteCommands($team_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function listCommandAutocompleteSuggestionsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $team_id = 'test-team_id';
        $user_input = 'test-user_input';

        $result = $this->endpoint->listCommandAutocompleteSuggestions($team_id, $user_input);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getCommandByIdBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'token' => 'test-token', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'creator_id' => 'test-creator_id', 'team_id' => 'test-team_id', 'trigger' => 'test-trigger', 'method' => 'test-method', 'username' => 'test-username', 'icon_url' => 'test-icon_url', 'auto_complete' => true, 'auto_complete_desc' => 'test-auto_complete_desc', 'auto_complete_hint' => 'test-auto_complete_hint', 'display_name' => 'test-display_name', 'description' => 'test-description', 'url' => 'test-url']);

        $command_id = 'test-command_id';

        $result = $this->endpoint->getCommandById($command_id);

        $this->assertNotNull($this->getLastRequest());
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\RegenCommandTokenResponse::class, $result);
    }
}
