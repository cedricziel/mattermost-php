<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PropertyFieldRequest
{
    public function __construct(
        /** The name of the property field. */
        public ?string $name = null,
        /** The type of the property field. */
        public ?string $type = null,
        /** Additional attributes for the property field. */
        public ?\stdClass $attrs = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PropertyFieldRequest The hydrated instance
     */
    public static function hydrate(?array $data): PropertyFieldRequest
    {
        $data ??= [];

        return new self(
            name: $data['name'] ?? null,
            type: $data['type'] ?? null,
            attrs: isset($data['attrs']) ? (object) $data['attrs'] : null,
        );
    }
}
