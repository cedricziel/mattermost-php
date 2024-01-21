<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GroupSyncableTeams
{
    public ?string $team_id;
    public ?string $team_display_name;
    public ?string $team_type;
    public ?string $group_id;
    public ?bool $auto_add;
    public ?int $create_at;
    public ?int $delete_at;
    public ?int $update_at;
}
