# Apps Framework

The Apps Framework provides a PSR-15 compatible request handler for building [Mattermost Apps](https://developers.mattermost.com/integrate/apps/). Apps can extend Mattermost with custom commands, channel header buttons, post menu actions, and more.

## Overview

A Mattermost App consists of:

- A **Manifest** that describes the app
- **Bindings** that define UI integration points
- **Handlers** that respond to user interactions

## Creating an App

```php
<?php

use CedricZiel\MattermostPhp\Apps\MattermostApp;
use CedricZiel\MattermostPhp\Apps\HttpDeploymentDescriptor;

$app = MattermostApp::create(
    'my-app',                              // App ID
    'My Custom App',                       // Display name
    'https://example.com'                  // Homepage URL
);

// Configure HTTP deployment
$app->withHttp(new HttpDeploymentDescriptor(
    rootUrl: 'https://your-app.example.com'
));
```

## Locations and Bindings

Apps can add UI elements to different locations in Mattermost:

| Location | Description |
|----------|-------------|
| `/channel_header` | Buttons in the channel header |
| `/post_menu` | Items in the post context menu |
| `/command` | Slash commands |
| `/in_post` | Embedded content in posts |

### Adding Bindings

```php
use CedricZiel\MattermostPhp\Apps\Location;
use CedricZiel\MattermostPhp\Apps\Bindings\LocationBinding;
use CedricZiel\MattermostPhp\Apps\Call;

// Add a channel header button
$app->addBinding(
    Location::channel_header,
    new LocationBinding(
        location: 'my-button',
        label: 'My Button',
        submit: new Call(path: '/my-action')
    )
);

// Add a slash command
$app->addBinding(
    Location::command,
    new LocationBinding(
        location: 'my-command',
        label: 'My Command',
        description: 'Does something useful',
        submit: new Call(path: '/my-command')
    )
);

// Add a post menu item
$app->addBinding(
    Location::post_menu,
    new LocationBinding(
        location: 'my-menu-item',
        label: 'Process Post',
        submit: new Call(path: '/process-post')
    )
);
```

## Handling Requests

The `MattermostApp` class implements PSR-15's `RequestHandlerInterface`:

```php
use Psr\Http\Message\ServerRequestInterface;

// In your application entry point
$response = $app->handle($serverRequest);
```

The app automatically handles these endpoints:

| Path | Purpose |
|------|---------|
| `/manifest.json` | Returns the app manifest |
| `/bindings` | Returns UI bindings |
| `/on-install` | Called when app is installed |
| `/on-uninstall` | Called when app is uninstalled |
| `/version-changed` | Called when app version changes |

## Lifecycle Events

Use PSR-14 events to respond to lifecycle hooks:

```php
use CedricZiel\MattermostPhp\Apps\Events\OnInstallEvent;
use CedricZiel\MattermostPhp\Apps\Events\OnUninstallEvent;
use CedricZiel\MattermostPhp\Apps\Events\OnBindingsRequestEvent;

// With a PSR-14 event dispatcher
$app->withEventDispatcher($eventDispatcher);

// Then in your event subscriber
class AppEventSubscriber
{
    public function onInstall(OnInstallEvent $event): void
    {
        // Handle installation
        // e.g., store app credentials, initialize database
    }

    public function onUninstall(OnUninstallEvent $event): void
    {
        // Handle uninstallation
        // e.g., cleanup resources
    }
}
```

Available events:

- `OnInstallEvent` - App was installed
- `OnUninstallEvent` - App was uninstalled
- `OnVersionChangedEvent` - App version was updated
- `OnBindingsRequestEvent` - Bindings were requested
- `OnManifestRequestEvent` - Manifest was requested

## Permissions

Request permissions your app needs:

```php
use CedricZiel\MattermostPhp\Apps\AppPermission;

$app->requestPermission(AppPermission::act_as_bot);
$app->requestPermission(AppPermission::act_as_user);
```

## Calls and Responses

When a user interacts with your app, Mattermost sends a `Call` to your endpoint. Respond with appropriate response types:

```php
use CedricZiel\MattermostPhp\Apps\Response\OkResponse;
use CedricZiel\MattermostPhp\Apps\Response\FormResponse;
use CedricZiel\MattermostPhp\Apps\Response\NavigateResponse;
use CedricZiel\MattermostPhp\Apps\Response\ErrorResponse;

// Simple acknowledgment
$response = new OkResponse();

// Return a form for user input
$response = new FormResponse($form);

// Navigate user to a URL
$response = new NavigateResponse('https://example.com');

// Return an error
$response = new ErrorResponse('Something went wrong');
```

## Forms

Create interactive forms for user input:

```php
use CedricZiel\MattermostPhp\Apps\Forms\Form;
use CedricZiel\MattermostPhp\Apps\Forms\Field;
use CedricZiel\MattermostPhp\Apps\Forms\FieldType;

$form = new Form(
    title: 'Create Task',
    submit: new Call(path: '/create-task'),
    fields: [
        new Field(
            name: 'title',
            type: FieldType::text,
            label: 'Task Title',
            is_required: true
        ),
        new Field(
            name: 'description',
            type: FieldType::text,
            label: 'Description',
            subtype: TextFieldSubtype::textarea
        ),
        new Field(
            name: 'priority',
            type: FieldType::static_select,
            label: 'Priority',
            options: [
                new SelectOption(label: 'High', value: 'high'),
                new SelectOption(label: 'Medium', value: 'medium'),
                new SelectOption(label: 'Low', value: 'low'),
            ]
        ),
    ]
);
```

## Complete Example

```php
<?php

use CedricZiel\MattermostPhp\Apps\MattermostApp;
use CedricZiel\MattermostPhp\Apps\HttpDeploymentDescriptor;
use CedricZiel\MattermostPhp\Apps\Location;
use CedricZiel\MattermostPhp\Apps\Bindings\LocationBinding;
use CedricZiel\MattermostPhp\Apps\Call;
use CedricZiel\MattermostPhp\Apps\AppPermission;

$app = MattermostApp::create(
    'task-manager',
    'Task Manager',
    'https://example.com/task-manager'
);

$app->withHttp(new HttpDeploymentDescriptor(
    rootUrl: 'https://your-app.example.com/mattermost'
));

// Request permissions
$app->requestPermission(AppPermission::act_as_bot);

// Add a slash command
$app->addBinding(
    Location::command,
    new LocationBinding(
        location: 'task',
        label: 'task',
        description: 'Manage tasks',
        submit: new Call(path: '/task')
    )
);

// Add channel header button
$app->addBinding(
    Location::channel_header,
    new LocationBinding(
        location: 'new-task',
        label: 'New Task',
        submit: new Call(path: '/new-task-form')
    )
);

// Handle requests (in your PSR-15 application)
$response = $app->handle($serverRequest);
```

## Next Steps

- [Slash Commands](slash-commands.md) - Simpler slash command integration
- [Examples](examples.md) - More code examples
- [Mattermost Apps Documentation](https://developers.mattermost.com/integrate/apps/)
