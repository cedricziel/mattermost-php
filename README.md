# Mattermost bindings for PHP

Built for building apps and integrations for Mattermost.

## Installation

```shell
composer require cedricziel/mattermost-php
```

## Usage

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
