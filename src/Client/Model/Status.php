<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Status
{
    public ?string $user_id;
    public ?string $status;
    public ?bool $manual;
    public ?int $last_activity_at;
}
;