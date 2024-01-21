<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Emoji
{
    /** The ID of the emoji */
    public ?string $id;

    /** The ID of the user that made the emoji */
    public ?string $creator_id;

    /** The name of the emoji */
    public ?string $name;

    /** The time in milliseconds the emoji was made */
    public ?int $create_at;

    /** The time in milliseconds the emoji was last updated */
    public ?int $update_at;

    /** The time in milliseconds the emoji was deleted */
    public ?int $delete_at;
}
