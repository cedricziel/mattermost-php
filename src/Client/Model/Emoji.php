<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Emoji
{
    public function __construct(
        /** The ID of the emoji */
        public ?string $id = null,
        /** The ID of the user that made the emoji */
        public ?string $creator_id = null,
        /** The name of the emoji */
        public ?string $name = null,
        /** The time in milliseconds the emoji was made */
        public ?int $create_at = null,
        /** The time in milliseconds the emoji was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds the emoji was deleted */
        public ?int $delete_at = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): Emoji {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            creator_id: isset($data['creator_id']) ? $data['creator_id'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
        );
        return $object;
    }
}
