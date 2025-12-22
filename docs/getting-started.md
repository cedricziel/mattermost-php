---
layout: default
title: Getting Started
---

# Getting Started

This guide will help you install and configure the Mattermost PHP SDK.

## Requirements

- PHP 8.2 or higher
- Composer
- A Mattermost instance with API access

## Installation

Install the SDK via Composer:

```bash
composer require cedricziel/mattermost-php
```

## Creating a Client

The `Client` class is the main entry point for interacting with the Mattermost API.

```php
<?php

use CedricZiel\MattermostPhp\Client;

$client = new Client('https://your-mattermost-instance.com');
```

## Authentication

### Token Authentication (Recommended)

Use a personal access token or bot token:

```php
$client->setToken('your-access-token');

// Verify the token works
$user = $client->authenticate();
echo "Authenticated as: " . $user->username;
```

To create a personal access token in Mattermost:

1. Go to **Settings > Security > Personal Access Tokens**
2. Click **Create Token**
3. Copy the token (it won't be shown again)

### Username/Password Authentication

Alternatively, authenticate with credentials:

```php
$user = $client->authenticate('username', 'password');
```

This will obtain a session token internally.

## Your First API Call

Here's a complete example that posts a message to a channel:

```php
<?php

require_once 'vendor/autoload.php';

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

// Create and authenticate the client
$client = new Client('https://your-mattermost-instance.com');
$client->setToken('your-access-token');

// Get team and channel
$team = $client->teams()->getTeamByName('my-team');
$channel = $client->channels()->getChannelByName($team->id, 'town-square');

// Create a post
$post = $client->posts()->createPost(
    new CreatePostRequest($channel->id, 'Hello from the PHP SDK!')
);

echo "Created post with ID: " . $post->id;
```

## PSR-18 HTTP Client

The SDK uses [PSR-18](https://www.php-fig.org/psr/psr-18/) HTTP client discovery. It will automatically find and use any installed PSR-18 compatible HTTP client.

Popular options include:

- `guzzlehttp/guzzle`
- `symfony/http-client`
- `php-http/curl-client`

You can also provide your own HTTP client:

```php
use CedricZiel\MattermostPhp\Client;

$client = new Client(
    baseUrl: 'https://your-mattermost-instance.com',
    httpClient: $yourPsr18Client,
    requestFactory: $yourPsr17RequestFactory,
    streamFactory: $yourPsr17StreamFactory,
);
```

## Next Steps

- [API Client Guide](api-client) - Learn about all available endpoints
- [Slash Commands](slash-commands) - Create custom slash commands
- [Examples](examples) - More code examples
