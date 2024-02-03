<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Product
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $price_per_seat = null,
        public ?array $add_ons = null,
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
            description: $data['description'] ?? null,
            price_per_seat: $data['price_per_seat'] ?? null,
            add_ons: $data['add_ons'] ?? null,
        );
        return $object;
    }
}
