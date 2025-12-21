# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Build and Development Commands

```bash
# Install dependencies
composer install

# Run tests
composer test
# or
vendor/bin/phpunit

# Run a single test file
vendor/bin/phpunit test/RequestTest.php

# Run a specific test method
vendor/bin/phpunit --filter testMethodName

# Static analysis
vendor/bin/phpstan analyse

# Regenerate API client from OpenAPI spec
php bin/api-generate
```

## Architecture Overview

This is a PHP SDK for the Mattermost API with two main components:

### 1. API Client (`src/Client.php`)

A fluent, endpoint-based HTTP client auto-generated from the Mattermost OpenAPI specification:

- `Client` is the main entry point, providing accessor methods for each API endpoint group (e.g., `$client->users()`, `$client->posts()`, `$client->channels()`)
- Each endpoint group lives in `src/Client/Endpoint/` and contains methods for specific API operations
- Request/response models are in `src/Client/Model/` (300+ auto-generated model classes)
- `ClientTrait` provides authentication via token or username/password
- `HttpClientTrait` handles HTTP request execution with PSR-18 client discovery

### 2. Apps Framework (`src/Apps/`)

A framework for building Mattermost Apps with PSR-15 request handling:

- `MattermostApp` - Main PSR-15 request handler that routes to bindings, install/uninstall handlers
- `Manifest` - App manifest definition with permissions, locations, and deployment info
- `Bindings/` - UI binding definitions for commands, channel headers, post menus
- `Response/` - Response types (OkResponse, FormResponse, NavigateResponse, etc.)
- `Events/` - PSR-14 events dispatched during app lifecycle (install, uninstall, bindings request)
- `Forms/` - Form field definitions for interactive dialogs

### 3. Slash Commands (`src/SlashCommands/`)

- `AbstractSlashCommand` - Base class for implementing slash command handlers
- `SlashCommandInput/Output` - Request/response models for slash command data

### Code Generation

The API client is generated from `resources/openapi.json` using `bin/api-generate`. This PHP script uses Nette PHP Generator to create endpoint classes, models, and the main Client class. Do not manually edit generated files in `src/Client/`.

## Commit Guidelines

Use semantic commits (e.g., `feat:`, `fix:`, `chore:`, `docs:`).
