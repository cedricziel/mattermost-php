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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return InvoiceLineItem The hydrated instance
     */
    public static function hydrate(?array $data): InvoiceLineItem
    {
        $data ??= [];

        return new self(
            price_id: $data['price_id'] ?? null,
            total: $data['total'] ?? null,
            quantity: $data['quantity'] ?? null,
            price_per_unit: $data['price_per_unit'] ?? null,
            description: $data['description'] ?? null,
            metadata: $data['metadata'] ?? null,
        );
    }
}
