---
layout: default
title: Examples
---

# Examples

This page contains practical code examples for common use cases.

## API Client Examples

### Post a Message

```php
<?php

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

$client = new Client('https://mattermost.example.com');
$client->setToken('your-token');

$post = $client->posts()->createPost(
    new CreatePostRequest(
        channel_id: 'channel-id-here',
        message: 'Hello from PHP!'
    )
);

echo "Posted message with ID: " . $post->id;
```

### Post with Attachment

```php
<?php

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

$client = new Client('https://mattermost.example.com');
$client->setToken('your-token');

// Upload file first
$upload = $client->files()->uploadFile(
    channel_id: $channelId,
    files: file_get_contents('/path/to/document.pdf'),
    filename: 'document.pdf'
);

// Create post with file attachment
$post = $client->posts()->createPost(
    new CreatePostRequest(
        channel_id: $channelId,
        message: 'Check out this document',
        file_ids: [$upload->file_infos[0]->id]
    )
);
```

### Get All Channels for a Team

```php
<?php

use CedricZiel\MattermostPhp\Client;

$client = new Client('https://mattermost.example.com');
$client->setToken('your-token');

$team = $client->teams()->getTeamByName('my-team');

$page = 0;
$perPage = 100;
$allChannels = [];

do {
    $channels = $client->channels()->getPublicChannelsForTeam(
        $team->id,
        page: $page,
        per_page: $perPage
    );

    $allChannels = array_merge($allChannels, $channels);
    $page++;
} while (count($channels) === $perPage);

echo "Found " . count($allChannels) . " channels\n";

foreach ($allChannels as $channel) {
    echo "- {$channel->display_name} ({$channel->name})\n";
}
```

### Search for Users

```php
<?php

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\SearchUsersRequest;

$client = new Client('https://mattermost.example.com');
$client->setToken('your-token');

$users = $client->users()->searchUsers(
    new SearchUsersRequest(
        term: 'john',
        team_id: $teamId
    )
);

foreach ($users as $user) {
    echo "{$user->username} - {$user->email}\n";
}
```

### Create a Channel

```php
<?php

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\CreateChannelRequest;

$client = new Client('https://mattermost.example.com');
$client->setToken('your-token');

$channel = $client->channels()->createChannel(
    new CreateChannelRequest(
        team_id: $teamId,
        name: 'project-alpha',
        display_name: 'Project Alpha',
        purpose: 'Discussions about Project Alpha',
        header: 'Welcome to Project Alpha!',
        type: 'O'  // 'O' = public, 'P' = private
    )
);

echo "Created channel: " . $channel->display_name;
```

### Add User to Channel

```php
<?php

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\AddChannelMemberRequest;

$client = new Client('https://mattermost.example.com');
$client->setToken('your-token');

$member = $client->channels()->addChannelMember(
    $channelId,
    new AddChannelMemberRequest(user_id: $userId)
);

echo "Added user to channel";
```

### Set User Status

```php
<?php

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\UpdateUserStatusRequest;

$client = new Client('https://mattermost.example.com');
$client->setToken('your-token');

// Get current user
$me = $client->users()->getUser('me');

// Set status to away
$client->status()->updateUserStatus(
    $me->id,
    new UpdateUserStatusRequest(
        user_id: $me->id,
        status: 'away'
    )
);

// Available statuses: 'online', 'away', 'offline', 'dnd'
```

## Slash Command Examples

### Echo Command

A simple command that echoes back the input:

```php
<?php

use CedricZiel\MattermostPhp\SlashCommands\AbstractSlashCommand;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandInput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;

class EchoCommand extends AbstractSlashCommand
{
    public function execute(SlashCommandInput $input): SlashCommandOutput
    {
        return SlashCommandOutput::create()
            ->withText("You said: " . $input->getText());
    }
}

// Usage: /echo Hello, world!
// Response: You said: Hello, world!
```

### Poll Command

Create a simple poll:

```php
<?php

use CedricZiel\MattermostPhp\SlashCommands\AbstractSlashCommand;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandInput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandResponseType;

class PollCommand extends AbstractSlashCommand
{
    public function execute(SlashCommandInput $input): SlashCommandOutput
    {
        // Parse: /poll "Question" "Option 1" "Option 2" "Option 3"
        preg_match_all('/"([^"]+)"/', $input->getText(), $matches);
        $parts = $matches[1] ?? [];

        if (count($parts) < 3) {
            return SlashCommandOutput::create()
                ->withText('Usage: /poll "Question" "Option 1" "Option 2" ...');
        }

        $question = array_shift($parts);
        $emojis = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

        $text = "**Poll: {$question}**\n\n";
        foreach ($parts as $i => $option) {
            $text .= ":{$emojis[$i]}: {$option}\n";
        }
        $text .= "\n_React with the corresponding emoji to vote!_";

        return SlashCommandOutput::create()
            ->withText($text)
            ->setResponseType(SlashCommandResponseType::IN_CHANNEL);
    }
}
```

### Giphy Command

Fetch a random GIF:

```php
<?php

use CedricZiel\MattermostPhp\SlashCommands\AbstractSlashCommand;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandInput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandResponseType;

class GiphyCommand extends AbstractSlashCommand
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function execute(SlashCommandInput $input): SlashCommandOutput
    {
        $query = urlencode($input->getText());
        $url = "https://api.giphy.com/v1/gifs/random?api_key={$this->apiKey}&tag={$query}";

        $response = json_decode(file_get_contents($url), true);
        $gifUrl = $response['data']['images']['original']['url'] ?? null;

        if (!$gifUrl) {
            return SlashCommandOutput::create()
                ->withText("No GIF found for: " . $input->getText());
        }

        return SlashCommandOutput::create()
            ->withText("![{$input->getText()}]({$gifUrl})")
            ->setResponseType(SlashCommandResponseType::IN_CHANNEL);
    }
}
```

## Integration with Frameworks

### Slim Framework

```php
<?php

use CedricZiel\MattermostPhp\SlashCommands\AbstractSlashCommand;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandInput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

class MyCommand extends AbstractSlashCommand
{
    public function execute(SlashCommandInput $input): SlashCommandOutput
    {
        return SlashCommandOutput::create()
            ->withText('Hello from Slim!');
    }
}

$app = AppFactory::create();

$app->post('/slash/mycommand', function (Request $request, Response $response) {
    $command = new MyCommand();
    return $command->handle($request);
});

$app->run();
```

### Laravel

```php
<?php

// app/Http/Controllers/SlashCommandController.php

namespace App\Http\Controllers;

use CedricZiel\MattermostPhp\SlashCommands\AbstractSlashCommand;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandInput;
use CedricZiel\MattermostPhp\SlashCommands\SlashCommandOutput;
use Illuminate\Http\Request;

class MyCommand extends AbstractSlashCommand
{
    public function execute(SlashCommandInput $input): SlashCommandOutput
    {
        return SlashCommandOutput::create()
            ->withText('Hello from Laravel!');
    }
}

class SlashCommandController extends Controller
{
    public function handle(Request $request)
    {
        $command = new MyCommand();
        $psrRequest = /* convert Laravel request to PSR-7 */;

        return $command->handle($psrRequest);
    }
}
```

## Error Handling

```php
<?php

use CedricZiel\MattermostPhp\Client;
use Psr\Http\Client\ClientExceptionInterface;

$client = new Client('https://mattermost.example.com');
$client->setToken('your-token');

try {
    $user = $client->users()->getUser('non-existent-id');
} catch (ClientExceptionInterface $e) {
    error_log("Mattermost API error: " . $e->getMessage());

    // Handle gracefully
    echo "Unable to fetch user. Please try again later.";
}
```

## More Resources

- [Getting Started](getting-started)
- [API Client Guide](api-client)
- [Slash Commands](slash-commands)
- [Mattermost Developer Docs](https://developers.mattermost.com/)
