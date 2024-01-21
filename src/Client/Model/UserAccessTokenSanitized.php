<?php

namespace CedricZiel\MattermostPhp\Client;

class UserAccessTokenSanitized
{
    /** Unique identifier for the token */
    public ?string $id;

    /** The user the token authenticates for */
    public ?string $user_id;

    /** A description of the token usage */
    public ?string $description;

    /** Indicates whether the token is active */
    public ?bool $is_active;
}
;