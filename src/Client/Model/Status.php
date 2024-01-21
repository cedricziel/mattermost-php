<?php

namespace CedricZiel\MattermostPhp\Client;

class Status
{
    public ?string $user_id;
    public ?string $status;
    public ?bool $manual;
    public ?int $last_activity_at;
}
;