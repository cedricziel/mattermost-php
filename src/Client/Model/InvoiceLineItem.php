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
}
;