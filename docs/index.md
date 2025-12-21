---
layout: default
title: Home
---

# Mattermost PHP SDK

A PHP SDK for building apps and integrations for Mattermost.

## Features

- **API Client** - Fluent, type-safe wrapper around the Mattermost REST API with 40+ endpoint groups
- **Apps Framework** - PSR-15 request handler for building [Mattermost Apps](https://developers.mattermost.com/integrate/apps/)
- **Slash Commands** - Framework for implementing custom slash commands

## Quick Links

- [Getting Started](getting-started) - Installation and first steps
- [API Client](api-client) - Using the REST API client
- [Apps Framework](apps-framework) - Building Mattermost Apps
- [Slash Commands](slash-commands) - Custom slash command development
- [Examples](examples) - Code examples for common use cases

## Requirements

- PHP 8.2 or higher
- Composer

## Installation

```bash
composer require cedricziel/mattermost-php
```

## Quick Example

```php
<?php

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

$client = new Client('https://your-mattermost-instance.com');
$client->setToken('your-access-token');

// Get a channel and post a message
$team = $client->teams()->getTeamByName('my-team');
$channel = $client->channels()->getChannelByName($team->id, 'town-square');
$post = $client->posts()->createPost(new CreatePostRequest($channel->id, 'Hello from PHP!'));
```

## Links

- [GitHub Repository](https://github.com/cedricziel/mattermost-php)
- [Packagist](https://packagist.org/packages/cedricziel/mattermost-php)
- [Mattermost Developer Documentation](https://developers.mattermost.com/)

## License

MIT
