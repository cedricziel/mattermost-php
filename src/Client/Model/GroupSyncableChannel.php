<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GroupSyncableChannel
{
    public function __construct(
        public ?string $channel_id = null,
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
    ): static {
        $object = new self(
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            group_id: isset($data['group_id']) ? $data['group_id'] : null,
            auto_add: isset($data['auto_add']) ? $data['auto_add'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
        );
        return $object;
    }
}
