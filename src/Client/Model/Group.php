<?php

namespace CedricZiel\MattermostPhp\Client;

class Group
{
    public ?string $id;
    public ?string $name;
    public ?string $display_name;
    public ?string $description;
    public ?string $source;
    public ?string $remote_id;
    public ?int $create_at;
    public ?int $update_at;
    public ?int $delete_at;
    public ?bool $has_syncables;
}
;