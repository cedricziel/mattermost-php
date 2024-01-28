<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class InvoiceLineItem
{
    public ?string $price_id;
    public ?int $total;
    public ?int $quantity;
    public ?int $price_per_unit;
    public ?string $description;
    public ?array $metadata;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->price_id = $data['price_id'];
        $this->total = $data['total'];
        $this->quantity = $data['quantity'];
        $this->price_per_unit = $data['price_per_unit'];
        $this->description = $data['description'];
        $this->metadata = $data['metadata'];
        return $this;
    }
}
