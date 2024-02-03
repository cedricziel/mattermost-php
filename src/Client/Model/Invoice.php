<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Invoice
{
    public function __construct(
        public ?string $id = null,
        public ?string $number = null,
        public ?int $create_at = null,
        public ?int $total = null,
        public ?int $tax = null,
        public ?string $status = null,
        public ?int $period_start = null,
        public ?int $period_end = null,
        public ?string $subscription_id = null,
        public ?array $item = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            number: $data['number'] ?? null,
            create_at: $data['create_at'] ?? null,
            total: $data['total'] ?? null,
            tax: $data['tax'] ?? null,
            status: $data['status'] ?? null,
            period_start: $data['period_start'] ?? null,
            period_end: $data['period_end'] ?? null,
            subscription_id: $data['subscription_id'] ?? null,
            item: $data['item'] ?? null,
        );
        return $object;
    }
}
