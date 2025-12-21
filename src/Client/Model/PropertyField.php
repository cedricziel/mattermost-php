<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PropertyField
{
    public function __construct(
        /** A unique, 26 characters long, alphanumeric identifier for the property field. */
        public ?string $id = null,
        /** The type of the property field. */
        public ?string $type = null,
        /** The name of the property field. */
        public ?string $name = null,
        /** The description of the property field. */
        public ?string $description = null,
        /** The property field creation timestamp, formatted as the number of milliseconds since the Unix epoch. */
        public ?int $create_at = null,
        /** The property field update timestamp, formatted as the number of milliseconds since the Unix epoch. */
        public ?int $update_at = null,
        /** The property field deletion timestamp, formatted as the number of milliseconds since the Unix epoch. It equals 0 if not deleted. */
        public ?int $delete_at = null,
        /** Additional attributes for the property field (options for select fields, visibility, etc.). */
        public ?\stdClass $attrs = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): PropertyField {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            attrs: isset($data['attrs']) ? $data['attrs'] : null,
        );
        return $object;
    }
}
