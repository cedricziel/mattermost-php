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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Product The hydrated instance
     */
    public static function hydrate(?array $data): Product
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            description: $data['description'] ?? null,
            price_per_seat: $data['price_per_seat'] ?? null,
            add_ons: $data['add_ons'] ?? null,
        );
    }
}
