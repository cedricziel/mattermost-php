<?php

namespace CedricZiel\MattermostPhp\Client;

class OutgoingOAuthConnectionGetItem
{
    /** The unique identifier for the outgoing OAuth connection. */
    public ?string $id;

    /** The name of the outgoing OAuth connection. */
    public ?string $name;

    /** The time in milliseconds the outgoing OAuth connection was created. */
    public ?int $create_at;

    /** The time in milliseconds the outgoing OAuth connection was last updated. */
    public ?int $update_at;

    /** The grant type of the outgoing OAuth connection. */
    public ?string $grant_type;

    /** The audiences of the outgoing OAuth connection. */
    public ?string $audiences;
}
;