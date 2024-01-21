<?php

namespace CedricZiel\MattermostPhp\Client;

class Audit
{
    public ?string $id;

    /** The time in milliseconds a audit was created */
    public ?int $create_at;
    public ?string $user_id;
    public ?string $action;
    public ?string $extra_info;
    public ?string $ip_address;
    public ?string $session_id;
}
;