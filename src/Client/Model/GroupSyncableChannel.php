<?php

namespace CedricZiel\MattermostPhp\Client;

class GroupSyncableChannel
{
    public ?string $channel_id;
    public ?string $group_id;
    public ?bool $auto_add;
    public ?int $create_at;
    public ?int $delete_at;
    public ?int $update_at;
}
;