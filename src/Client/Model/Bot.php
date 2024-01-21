<?php

namespace CedricZiel\MattermostPhp\Client;

/**
 * A bot account
 */
class Bot
{
    /** The user id of the associated user entry. */
    public ?string $user_id;

    /** The time in milliseconds a bot was created */
    public ?int $create_at;

    /** The time in milliseconds a bot was last updated */
    public ?int $update_at;

    /** The time in milliseconds a bot was deleted */
    public ?int $delete_at;
    public ?string $username;
    public ?string $display_name;
    public ?string $description;

    /** The user id of the user that currently owns this bot. */
    public ?string $owner_id;
}
;