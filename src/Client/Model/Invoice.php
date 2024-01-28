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
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->number = $data['number'];
        $this->create_at = $data['create_at'];
        $this->total = $data['total'];
        $this->tax = $data['tax'];
        $this->status = $data['status'];
        $this->period_start = $data['period_start'];
        $this->period_end = $data['period_end'];
        $this->subscription_id = $data['subscription_id'];
        $this->item = $data['item'];
        return $this;
    }
}
