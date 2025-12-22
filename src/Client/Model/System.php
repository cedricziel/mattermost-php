<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class System
{
    public function __construct(
        /** System property name */
        public ?string $name = null,
        /** System property value */
        public ?string $value = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return System The hydrated instance
     */
    public static function hydrate(?array $data): System
    {
        $data ??= [];

        return new self(
            name: $data['name'] ?? null,
            value: $data['value'] ?? null,
        );
    }
}
