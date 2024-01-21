<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAccessToken
{
    /** Unique identifier for the token */
    public ?string $id;

    /** The token used for authentication */
    public ?string $token;

    /** The user the token authenticates for */
    public ?string $user_id;

    /** A description of the token usage */
    public ?string $description;
}
;