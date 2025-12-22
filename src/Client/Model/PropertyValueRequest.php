<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PropertyValueRequest
{
    public function __construct(
        /** The JSON-encoded value to set for the property. */
        public ?string $value = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PropertyValueRequest The hydrated instance
     */
    public static function hydrate(?array $data): PropertyValueRequest
    {
        $data ??= [];

        return new self(
            value: $data['value'] ?? null,
        );
    }
}
