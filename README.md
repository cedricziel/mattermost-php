# Mattermost bindings for PHP

Built for building apps and integrations for Mattermost.

## Installation

```shell
composer require cedricziel/mattermost-php
```

## Usage

### API Client

The API client is a simple wrapper around the Mattermost API. It provides a fluent interface to interact with the API.

```php
<?php

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

// create a client instance
$client = new Client(getenv('MATTERMOST_SITE_URL'));
// provide a token and authenticate
$client->setToken(getenv('MATTERMOST_TOKEN'));
$yourUser = $client->authenticate();

// OR authenticate with username and password
$client->authenticate($loginId, $password);

// get the team and a specific channel
$team = $client->teams()->getTeamByName(getenv('MATTERMOST_TEAM_NAME'));
$client->channels()->getAllChannels(per_page: 100);
$channel = $client->channels()->getChannelByName($team->id, 'town-square');

// create a post in the channel
$post = $client->posts()->createPost(new CreatePostRequest($channel->id, 'Hello World!'));
var_dump($post);
```

### Slash commands

Slash commands are one of the most common ways to integrate with Mattermost. They are invoked by typing a slash followed by the command name and any arguments into the message box in Mattermost (e.g. `/weather New York`).

To implement a slash command that would respond with the weather in a given city, you would do something like this:

**Note:** This library does recommend using a PSR-15 compatible middleware stack to handle the request and response.
This library provides an `AbstractSlashCommand` class that can be extended to implement a slash command that does everything
once it needs to handle a request.

```php
<?php

// your PSR-15 ServerRequestInterface implementation
$serverRequest = '...';

$slashCommand = new class('weather') extends \CedricZiel\Mattermost\SlashCommands\AbstractSlashCommand {
    public function execute(SlashCommandInput $input): SlashCommandOutput
    {
        $city = $input->getParameters();
        /**
         * Your business logic here
         */
        $weather = $this->getWeatherForCity($city);

        return SlashCommandOutput::create()
            ->setText(sprintf('The weather in %s is %s', $city, $weather));
    }
};

// handle the request. this will invoke the slash command and return a PSR-7 compatible response
$slashCommand->handle($serverRequest);
```

Please look at the tests for more examples.

## License

MIT
