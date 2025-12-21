# API Client

The API client provides a fluent, type-safe interface to the Mattermost REST API. It is auto-generated from the official Mattermost OpenAPI specification.

## Overview

The client organizes API endpoints into logical groups accessible via method calls:

```php
$client->users()      // User management
$client->teams()      // Team operations
$client->channels()   // Channel operations
$client->posts()      // Post/message operations
$client->files()      // File uploads/downloads
// ... and 40+ more endpoint groups
```

## Available Endpoint Groups

| Method | Description |
|--------|-------------|
| `users()` | User management, authentication, preferences |
| `teams()` | Team creation, membership, settings |
| `channels()` | Channel management, membership |
| `posts()` | Create, update, delete messages |
| `files()` | File upload/download |
| `reactions()` | Message reactions |
| `emoji()` | Custom emoji management |
| `webhooks()` | Incoming/outgoing webhooks |
| `bots()` | Bot account management |
| `commands()` | Slash command configuration |
| `plugins()` | Plugin management |
| `system()` | System configuration |
| `jobs()` | Background job management |
| `compliance()` | Compliance exports |
| `groups()` | LDAP/AD groups |
| `roles()` | Role and permission management |
| `status()` | User presence status |
| `threads()` | Thread management |

See the `Client` class for the complete list of available endpoints.

## Common Operations

### Working with Users

```php
// Get current user
$me = $client->users()->getUser('me');

// Get user by username
$user = $client->users()->getUserByUsername('john.doe');

// Search users
$users = $client->users()->searchUsers(
    new SearchUsersRequest(term: 'john')
);

// Update user status
$client->status()->updateUserStatus(
    $userId,
    new UpdateUserStatusRequest(status: 'online')
);
```

### Working with Teams

```php
// Get team by name
$team = $client->teams()->getTeamByName('my-team');

// List teams for user
$teams = $client->teams()->getTeamsForUser($userId);

// Get team members
$members = $client->teams()->getTeamMembers($team->id);
```

### Working with Channels

```php
// Get channel by name
$channel = $client->channels()->getChannelByName($teamId, 'general');

// Create a channel
$newChannel = $client->channels()->createChannel(
    new CreateChannelRequest(
        team_id: $teamId,
        name: 'my-channel',
        display_name: 'My Channel',
        type: 'O'  // O = public, P = private
    )
);

// List channels
$channels = $client->channels()->getAllChannels(per_page: 100);

// Add user to channel
$client->channels()->addChannelMember(
    $channelId,
    new AddChannelMemberRequest(user_id: $userId)
);
```

### Working with Posts

```php
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

// Create a post
$post = $client->posts()->createPost(
    new CreatePostRequest(
        channel_id: $channelId,
        message: 'Hello, world!'
    )
);

// Create a post with props
$post = $client->posts()->createPost(
    new CreatePostRequest(
        channel_id: $channelId,
        message: 'Check this out',
        props: (object)['key' => 'value']
    )
);

// Get posts in channel
$posts = $client->posts()->getPostsForChannel($channelId);

// Update a post
$client->posts()->updatePost(
    $postId,
    new UpdatePostRequest(message: 'Updated message')
);

// Delete a post
$client->posts()->deletePost($postId);
```

### Working with Files

```php
// Upload a file
$fileInfo = $client->files()->uploadFile(
    channel_id: $channelId,
    files: file_get_contents('/path/to/file.pdf'),
    filename: 'document.pdf'
);

// Create post with attachment
$post = $client->posts()->createPost(
    new CreatePostRequest(
        channel_id: $channelId,
        message: 'See attached file',
        file_ids: [$fileInfo->file_infos[0]->id]
    )
);

// Get file info
$info = $client->files()->getFile($fileId);

// Download file
$content = $client->files()->getFileContent($fileId);
```

## Error Handling

API calls may throw exceptions on errors:

```php
use Psr\Http\Client\ClientExceptionInterface;

try {
    $user = $client->users()->getUser('non-existent-id');
} catch (ClientExceptionInterface $e) {
    // Handle HTTP/network errors
    echo "Request failed: " . $e->getMessage();
}
```

The API returns typed response models. Check for error responses:

```php
$response = $client->users()->getUser($userId);

// Response is a typed model (e.g., User)
echo $response->username;
```

## Request Models

Most write operations require request model objects:

```php
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;
use CedricZiel\MattermostPhp\Client\Model\CreateChannelRequest;
use CedricZiel\MattermostPhp\Client\Model\UpdateUserRequest;

// Models use named constructor parameters
$request = new CreatePostRequest(
    channel_id: $channelId,
    message: 'Hello!'
);
```

## Pagination

Many list endpoints support pagination:

```php
// Get first page of channels
$channels = $client->channels()->getAllChannels(
    page: 0,
    per_page: 60
);

// Get next page
$moreChannels = $client->channels()->getAllChannels(
    page: 1,
    per_page: 60
);
```

## Next Steps

- [Apps Framework](apps-framework.md) - Build Mattermost Apps
- [Slash Commands](slash-commands.md) - Create custom slash commands
- [Examples](examples.md) - More code examples
