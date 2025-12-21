<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PropertyValue
{
    public function __construct(
        /** A unique, 26 characters long, alphanumeric identifier for the property value. */
        public ?string $id = null,
        /** The identifier of the property field this value belongs to. */
        public ?string $field_id = null,
        /** The JSON-encoded value of the property. */
        public ?string $value = null,
        /** The property value creation timestamp, formatted as the number of milliseconds since the Unix epoch. */
        public ?int $create_at = null,
        /** The property value update timestamp, formatted as the number of milliseconds since the Unix epoch. */
        public ?int $update_at = null,
        /** The property value deletion timestamp, formatted as the number of milliseconds since the Unix epoch. It equals 0 if not deleted. */
        public ?int $delete_at = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): PropertyValue {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            field_id: isset($data['field_id']) ? $data['field_id'] : null,
            value: isset($data['value']) ? $data['value'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
        );
        return $object;
    }
}
