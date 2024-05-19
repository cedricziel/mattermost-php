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
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            number: isset($data['number']) ? $data['number'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            total: isset($data['total']) ? $data['total'] : null,
            tax: isset($data['tax']) ? $data['tax'] : null,
            status: isset($data['status']) ? $data['status'] : null,
            period_start: isset($data['period_start']) ? $data['period_start'] : null,
            period_end: isset($data['period_end']) ? $data['period_end'] : null,
            subscription_id: isset($data['subscription_id']) ? $data['subscription_id'] : null,
            item: isset($data['item']) ? $data['item'] : null,
        );
        return $object;
    }
}
