<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Group
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $display_name = null,
        public ?string $description = null,
        public ?string $source = null,
        public ?string $remote_id = null,
        public ?int $create_at = null,
        public ?int $update_at = null,
        public ?int $delete_at = null,
        public ?bool $has_syncables = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Group The hydrated instance
     */
    public static function hydrate(?array $data): Group
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            display_name: $data['display_name'] ?? null,
            description: $data['description'] ?? null,
            source: $data['source'] ?? null,
            remote_id: $data['remote_id'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            has_syncables: $data['has_syncables'] ?? null,
        );
    }
}
