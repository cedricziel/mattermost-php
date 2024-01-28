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
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['channel_id'] */
        if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var string $data['channel_display_name'] */
        if (isset($data['channel_display_name'])) $this->channel_display_name = $data['channel_display_name'];
        /** @var string $data['channel_type'] */
        if (isset($data['channel_type'])) $this->channel_type = $data['channel_type'];
        /** @var string $data['team_id'] */
        if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var string $data['team_display_name'] */
        if (isset($data['team_display_name'])) $this->team_display_name = $data['team_display_name'];
        /** @var string $data['team_type'] */
        if (isset($data['team_type'])) $this->team_type = $data['team_type'];
        /** @var string $data['group_id'] */
        if (isset($data['group_id'])) $this->group_id = $data['group_id'];
        /** @var bool $data['auto_add'] */
        if (isset($data['auto_add'])) $this->auto_add = $data['auto_add'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['delete_at'] */
        if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var int $data['update_at'] */
        if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        return $this;
    }
}
