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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            name: $data['name'] ?? null,
            value: $data['value'] ?? null,
        );
        return $object;
    }
}
