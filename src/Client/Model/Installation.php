<?php

namespace CedricZiel\MattermostPhp\Client;

class Installation
{
    /** A unique identifier */
    public ?string $id;
    public $allowed_ip_ranges;

    /** The current state of the installation */
    public ?string $state;
}
;