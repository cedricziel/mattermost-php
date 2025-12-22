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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Invoice The hydrated instance
     */
    public static function hydrate(?array $data): Invoice
    {
        $data ??= [];

        return new self(
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
    }
}
