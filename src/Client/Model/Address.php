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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Address The hydrated instance
     */
    public static function hydrate(?array $data): Address
    {
        $data ??= [];

        return new self(
            city: $data['city'] ?? null,
            country: $data['country'] ?? null,
            line1: $data['line1'] ?? null,
            line2: $data['line2'] ?? null,
            postal_code: $data['postal_code'] ?? null,
            state: $data['state'] ?? null,
        );
    }
}
