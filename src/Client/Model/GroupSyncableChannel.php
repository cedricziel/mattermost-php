<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GroupSyncableChannel
{
    public ?string $channel_id;
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
        $this->channel_id = $data['channel_id'];
        $this->group_id = $data['group_id'];
        $this->auto_add = $data['auto_add'];
        $this->create_at = $data['create_at'];
        $this->delete_at = $data['delete_at'];
        $this->update_at = $data['update_at'];
        return $this;
    }
}
