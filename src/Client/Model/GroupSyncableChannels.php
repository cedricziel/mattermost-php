<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GroupSyncableChannels
{
    public ?string $channel_id;
    public ?string $channel_display_name;
    public ?string $channel_type;
    public ?string $team_id;
    public ?string $team_display_name;
    public ?string $team_type;
    public ?string $group_id;
    public ?bool $auto_add;
    public ?int $create_at;
    public ?int $delete_at;
    public ?int $update_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->channel_id = $data['channel_id'];
        $this->channel_display_name = $data['channel_display_name'];
        $this->channel_type = $data['channel_type'];
        $this->team_id = $data['team_id'];
        $this->team_display_name = $data['team_display_name'];
        $this->team_type = $data['team_type'];
        $this->group_id = $data['group_id'];
        $this->auto_add = $data['auto_add'];
        $this->create_at = $data['create_at'];
        $this->delete_at = $data['delete_at'];
        $this->update_at = $data['update_at'];
        return $this;
    }
}
