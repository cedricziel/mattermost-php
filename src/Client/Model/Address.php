<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Address
{
    public function __construct(
        public ?string $city = null,
        public ?string $country = null,
        public ?string $line1 = null,
        public ?string $line2 = null,
        public ?string $postal_code = null,
        public ?string $state = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            city: $data['city'] ?? null,
            country: $data['country'] ?? null,
            line1: $data['line1'] ?? null,
            line2: $data['line2'] ?? null,
            postal_code: $data['postal_code'] ?? null,
            state: $data['state'] ?? null,
        );
        return $object;
    }
}
