<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GroupSyncableTeam
{
    public function __construct(
        public ?string $team_id = null,
        public ?string $group_id = null,
        public ?bool $auto_add = null,
        public ?int $create_at = null,
        public ?int $delete_at = null,
        public ?int $update_at = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GroupSyncableTeam The hydrated instance
     */
    public static function hydrate(?array $data): GroupSyncableTeam
    {
        $data ??= [];

        return new self(
            team_id: $data['team_id'] ?? null,
            group_id: $data['group_id'] ?? null,
            auto_add: $data['auto_add'] ?? null,
            create_at: $data['create_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            update_at: $data['update_at'] ?? null,
        );
    }
}
