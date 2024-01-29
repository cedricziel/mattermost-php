<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GroupSyncableTeams
{
    public function __construct(
        public ?string $team_id = null,
        public ?string $team_display_name = null,
        public ?string $team_type = null,
        public ?string $group_id = null,
        public ?bool $auto_add = null,
        public ?int $create_at = null,
        public ?int $delete_at = null,
        public ?int $update_at = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
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
