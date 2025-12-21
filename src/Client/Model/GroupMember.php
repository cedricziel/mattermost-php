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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GroupMember {
        $object = new self(
            group_id: isset($data['group_id']) ? $data['group_id'] : null,
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
        );
        return $object;
    }
}
