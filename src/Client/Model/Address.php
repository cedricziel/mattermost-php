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
        $object = new self(
            city: isset($data['city']) ? $data['city'] : null,
            country: isset($data['country']) ? $data['country'] : null,
            line1: isset($data['line1']) ? $data['line1'] : null,
            line2: isset($data['line2']) ? $data['line2'] : null,
            postal_code: isset($data['postal_code']) ? $data['postal_code'] : null,
            state: isset($data['state']) ? $data['state'] : null,
        );
        return $object;
    }
}
