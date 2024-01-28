<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Invoice
{
    public ?string $id;
    public ?string $number;
    public ?int $create_at;
    public ?int $total;
    public ?int $tax;
    public ?string $status;
    public ?int $period_start;
    public ?int $period_end;
    public ?string $subscription_id;
    public ?array $item;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['number'] */
        if (isset($data['number'])) $this->number = $data['number'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['total'] */
        if (isset($data['total'])) $this->total = $data['total'];
        /** @var int $data['tax'] */
        if (isset($data['tax'])) $this->tax = $data['tax'];
        /** @var string $data['status'] */
        if (isset($data['status'])) $this->status = $data['status'];
        /** @var int $data['period_start'] */
        if (isset($data['period_start'])) $this->period_start = $data['period_start'];
        /** @var int $data['period_end'] */
        if (isset($data['period_end'])) $this->period_end = $data['period_end'];
        /** @var string $data['subscription_id'] */
        if (isset($data['subscription_id'])) $this->subscription_id = $data['subscription_id'];
        /** @var array $data['item'] */
        if (isset($data['item'])) $this->item = $data['item'];
        return $this;
    }
}
