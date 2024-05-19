<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class InvoiceLineItem
{
    public function __construct(
        public ?string $price_id = null,
        public ?int $total = null,
        public ?int $quantity = null,
        public ?int $price_per_unit = null,
        public ?string $description = null,
        public ?array $metadata = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): InvoiceLineItem {
        $object = new self(
            price_id: isset($data['price_id']) ? $data['price_id'] : null,
            total: isset($data['total']) ? $data['total'] : null,
            quantity: isset($data['quantity']) ? $data['quantity'] : null,
            price_per_unit: isset($data['price_per_unit']) ? $data['price_per_unit'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            metadata: isset($data['metadata']) ? $data['metadata'] : null,
        );
        return $object;
    }
}
