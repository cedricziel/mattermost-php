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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            source: isset($data['source']) ? $data['source'] : null,
            remote_id: isset($data['remote_id']) ? $data['remote_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            has_syncables: isset($data['has_syncables']) ? $data['has_syncables'] : null,
        );
        return $object;
    }
}
