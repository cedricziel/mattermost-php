<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GroupMember
{
    public function __construct(
        public ?string $group_id = null,
        public ?string $user_id = null,
        public ?int $create_at = null,
        public ?int $delete_at = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GroupMember The hydrated instance
     */
    public static function hydrate(?array $data): GroupMember
    {
        $data ??= [];

        return new self(
            group_id: $data['group_id'] ?? null,
            user_id: $data['user_id'] ?? null,
            create_at: $data['create_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
        );
    }
}
