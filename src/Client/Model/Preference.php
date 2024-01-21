<?php

namespace CedricZiel\MattermostPhp\Client;

class Preference
{
    /** The ID of the user that owns this preference */
    public ?string $user_id;
    public ?string $category;
    public ?string $name;
    public ?string $value;
}
;