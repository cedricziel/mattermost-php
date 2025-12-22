<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Subscription
{
    public function __construct(
        public ?string $id = null,
        public ?string $customer_id = null,
        public ?string $product_id = null,
        public ?array $add_ons = null,
        public ?int $start_at = null,
        public ?int $end_at = null,
        public ?int $create_at = null,
        public ?int $seats = null,
        public ?string $dns = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Subscription The hydrated instance
     */
    public static function hydrate(?array $data): Subscription
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            customer_id: $data['customer_id'] ?? null,
            product_id: $data['product_id'] ?? null,
            add_ons: $data['add_ons'] ?? null,
            start_at: $data['start_at'] ?? null,
            end_at: $data['end_at'] ?? null,
            create_at: $data['create_at'] ?? null,
            seats: $data['seats'] ?? null,
            dns: $data['dns'] ?? null,
        );
    }
}
