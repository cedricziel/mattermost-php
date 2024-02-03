<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GroupSyncableChannels
{
    public function __construct(
        public ?string $channel_id = null,
        public ?string $channel_display_name = null,
        public ?string $channel_type = null,
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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            channel_id: $data['channel_id'] ?? null,
            channel_display_name: $data['channel_display_name'] ?? null,
            channel_type: $data['channel_type'] ?? null,
            team_id: $data['team_id'] ?? null,
            team_display_name: $data['team_display_name'] ?? null,
            team_type: $data['team_type'] ?? null,
            group_id: $data['group_id'] ?? null,
            auto_add: $data['auto_add'] ?? null,
            create_at: $data['create_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            update_at: $data['update_at'] ?? null,
        );
        return $object;
    }
}
