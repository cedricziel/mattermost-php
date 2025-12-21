# Slash Commands

Slash commands are one of the most common ways to integrate with Mattermost. Users invoke them by typing a slash followed by the command name (e.g., `/weather toronto`).

This library provides an `AbstractSlashCommand` class for implementing custom slash commands with PSR-15 compatible request handling.

## Overview

To create a slash command:

1. Extend `AbstractSlashCommand`
2. Implement the `execute()` method
3. Return a `SlashCommandOutput`

## Basic Example

```php
<?php

use CedricZiel\MattermostPhp\SlashCommands\AbstractSlashCommand;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandInput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;

class WeatherCommand extends AbstractSlashCommand
{
    public function execute(SlashCommandInput $input): SlashCommandOutput
    {
        $city = $input->getText();

        // Your business logic here
        $weather = $this->getWeatherForCity($city);

        return SlashCommandOutput::create()
            ->withText("The weather in {$city} is {$weather}");
    }

    private function getWeatherForCity(string $city): string
    {
        // Fetch weather data from an API
        return 'sunny, 22°C';
    }
}
```

## Handling Requests

The `AbstractSlashCommand` implements PSR-15's `RequestHandlerInterface`:

```php
// In your application entry point
$command = new WeatherCommand();
$response = $command->handle($serverRequest);

// $response is a PSR-7 ResponseInterface
```

## SlashCommandInput

The `SlashCommandInput` class provides access to all data sent by Mattermost:

```php
public function execute(SlashCommandInput $input): SlashCommandOutput
{
    // Command text (everything after the command name)
    $text = $input->getText();           // e.g., "toronto week"

    // The command that was invoked
    $command = $input->getCommand();     // e.g., "/weather"

    // Channel where command was invoked
    $channelId = $input->getChannelId();
    $channelName = $input->getChannelName();

    // Team information
    $teamId = $input->getTeamId();
    $teamDomain = $input->getTeamDomain();

    // User who invoked the command
    $userId = $input->getUserId();
    $userName = $input->getUserName();

    // For delayed responses
    $responseUrl = $input->getResponseUrl();

    // Verification token
    $token = $input->getToken();

    // For interactive components
    $triggerId = $input->getTriggerId();

    // Additional context (if any)
    $context = $input->getContext();

    // Access the original PSR-7 request
    $request = $input->getRequest();

    // ...
}
```

## SlashCommandOutput

The `SlashCommandOutput` class provides a fluent interface for building responses:

### Basic Text Response

```php
return SlashCommandOutput::create()
    ->withText('Hello, world!');
```

### Response Types

```php
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandResponseType;

// Ephemeral (only visible to the user who invoked the command)
return SlashCommandOutput::create()
    ->withText('Only you can see this')
    ->setResponseType(SlashCommandResponseType::EPHEMERAL);

// In-channel (visible to everyone in the channel)
return SlashCommandOutput::create()
    ->withText('Everyone can see this')
    ->setResponseType(SlashCommandResponseType::IN_CHANNEL);
```

### Rich Responses with Attachments

```php
use CedricZiel\MattermostPhp\Common\Attachments\Attachment;
use CedricZiel\MattermostPhp\Common\Attachments\Field;

return SlashCommandOutput::create()
    ->withText('Weather Report')
    ->addAttachment(
        (new Attachment())
            ->setTitle('Toronto Weather')
            ->setColor('#00FF00')
            ->addField(new Field('Temperature', '22°C', true))
            ->addField(new Field('Condition', 'Sunny', true))
            ->addField(new Field('Humidity', '45%', true))
    );
```

### Custom Username and Icon

```php
return SlashCommandOutput::create()
    ->withText('Automated message')
    ->setUsername('Weather Bot')
    ->setIconUrl('https://example.com/weather-icon.png');
```

### Navigate to URL

```php
return SlashCommandOutput::create()
    ->setGotoLocation('https://example.com/detailed-report');
```

### Post to Different Channel

```php
return SlashCommandOutput::create()
    ->withText('Cross-posted message')
    ->setChannelId($differentChannelId);
```

### Extra Responses

Send multiple messages:

```php
$extra = SlashCommandOutput::create()
    ->withText('This is a follow-up message');

return SlashCommandOutput::create()
    ->withText('Main message')
    ->addExtraResponse($extra);
```

### Skip Slack Parsing

Disable Slack-compatible markdown parsing:

```php
return SlashCommandOutput::create()
    ->withText('Raw text: *not bold*')
    ->skipSlackParsing();
```

### Custom Props

Add custom properties to the response:

```php
return SlashCommandOutput::create()
    ->withText('Message with props')
    ->addProp('custom_key', 'custom_value');
```

## Complete Example

```php
<?php

use CedricZiel\MattermostPhp\SlashCommands\AbstractSlashCommand;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandInput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandResponseType;
use CedricZiel\MattermostPhp\Common\Attachments\Attachment;
use CedricZiel\MattermostPhp\Common\Attachments\Field;

class TaskCommand extends AbstractSlashCommand
{
    public function execute(SlashCommandInput $input): SlashCommandOutput
    {
        $args = explode(' ', $input->getText(), 2);
        $action = $args[0] ?? 'list';
        $param = $args[1] ?? '';

        return match($action) {
            'add' => $this->addTask($param, $input),
            'list' => $this->listTasks($input),
            'done' => $this->completeTask($param, $input),
            default => $this->showHelp(),
        };
    }

    private function addTask(string $title, SlashCommandInput $input): SlashCommandOutput
    {
        // Add task to your system...

        return SlashCommandOutput::create()
            ->withText("Task added: {$title}")
            ->setResponseType(SlashCommandResponseType::EPHEMERAL);
    }

    private function listTasks(SlashCommandInput $input): SlashCommandOutput
    {
        // Get tasks from your system...
        $tasks = ['Task 1', 'Task 2', 'Task 3'];

        $attachment = (new Attachment())
            ->setTitle('Your Tasks')
            ->setColor('#0066FF');

        foreach ($tasks as $i => $task) {
            $attachment->addField(new Field((string)($i + 1), $task, false));
        }

        return SlashCommandOutput::create()
            ->addAttachment($attachment);
    }

    private function completeTask(string $id, SlashCommandInput $input): SlashCommandOutput
    {
        // Mark task complete...

        return SlashCommandOutput::create()
            ->withText("Task {$id} marked complete!")
            ->setResponseType(SlashCommandResponseType::IN_CHANNEL);
    }

    private function showHelp(): SlashCommandOutput
    {
        return SlashCommandOutput::create()
            ->withText(<<<HELP
            **Task Command Help**
            - `/task add <title>` - Add a new task
            - `/task list` - List your tasks
            - `/task done <id>` - Mark a task complete
            HELP);
    }
}
```

## Setting Up in Mattermost

1. Go to **Main Menu > Integrations > Slash Commands**
2. Click **Add Slash Command**
3. Configure:
   - **Title**: Your command name
   - **Command Trigger Word**: The word after `/` (e.g., `task`)
   - **Request URL**: Your endpoint URL
   - **Request Method**: POST
4. Save and note the **Token** for verification

## Token Verification

Verify the token to ensure requests are from your Mattermost instance:

```php
public function execute(SlashCommandInput $input): SlashCommandOutput
{
    if ($input->getToken() !== $_ENV['MATTERMOST_SLASH_TOKEN']) {
        return SlashCommandOutput::create()
            ->withText('Unauthorized')
            ->setResponseType(SlashCommandResponseType::EPHEMERAL);
    }

    // Process command...
}
```

## Next Steps

- [Apps Framework](apps-framework.md) - For more complex integrations
- [Examples](examples.md) - More code examples
- [Mattermost Slash Commands Docs](https://developers.mattermost.com/integrate/slash-commands/)
