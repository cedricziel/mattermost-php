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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PropertyField The hydrated instance
     */
    public static function hydrate(?array $data): PropertyField
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            type: $data['type'] ?? null,
            name: $data['name'] ?? null,
            description: $data['description'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            attrs: isset($data['attrs']) ? (object) $data['attrs'] : null,
        );
    }
}
