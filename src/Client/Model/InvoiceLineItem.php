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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['price_id'] */
            if (isset($data['price_id'])) $this->price_id = $data['price_id'];
        /** @var int $data['total'] */
            if (isset($data['total'])) $this->total = $data['total'];
        /** @var int $data['quantity'] */
            if (isset($data['quantity'])) $this->quantity = $data['quantity'];
        /** @var int $data['price_per_unit'] */
            if (isset($data['price_per_unit'])) $this->price_per_unit = $data['price_per_unit'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var array $data['metadata'] */
            if (isset($data['metadata'])) $this->metadata = $data['metadata'];
        return $this;
    }
}
