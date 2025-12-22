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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Emoji The hydrated instance
     */
    public static function hydrate(?array $data): Emoji
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            creator_id: $data['creator_id'] ?? null,
            name: $data['name'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
        );
    }
}
