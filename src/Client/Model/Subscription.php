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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            customer_id: isset($data['customer_id']) ? $data['customer_id'] : null,
            product_id: isset($data['product_id']) ? $data['product_id'] : null,
            add_ons: isset($data['add_ons']) ? $data['add_ons'] : null,
            start_at: isset($data['start_at']) ? $data['start_at'] : null,
            end_at: isset($data['end_at']) ? $data['end_at'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            seats: isset($data['seats']) ? $data['seats'] : null,
            dns: isset($data['dns']) ? $data['dns'] : null,
        );
        return $object;
    }
}
