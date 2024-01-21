<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OwnerInfo
{
    /** A unique, 26 characters long, alphanumeric identifier for the owner. */
    public ?string $user_id;

    /** Owner's username. */
    public ?string $username;
}
