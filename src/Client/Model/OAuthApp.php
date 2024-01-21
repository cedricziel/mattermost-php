<?php

namespace CedricZiel\MattermostPhp\Client;

class OAuthApp
{
    /** The client id of the application */
    public ?string $id;

    /** The client secret of the application */
    public ?string $client_secret;

    /** The name of the client application */
    public ?string $name;

    /** A short description of the application */
    public ?string $description;

    /** A URL to an icon to display with the application */
    public ?string $icon_url;

    /** A list of callback URLs for the appliation */
    public ?array $callback_urls;

    /** A link to the website of the application */
    public ?string $homepage;

    /** Set this to `true` to skip asking users for permission */
    public ?bool $is_trusted;

    /** The time of registration for the application */
    public ?int $create_at;

    /** The last time of update for the application */
    public ?int $update_at;
}
;