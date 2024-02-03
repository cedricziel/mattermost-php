<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddOn
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $display_name = null,
        public ?string $price_per_seat = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            display_name: $data['display_name'] ?? null,
            price_per_seat: $data['price_per_seat'] ?? null,
        );
        return $object;
    }
}
