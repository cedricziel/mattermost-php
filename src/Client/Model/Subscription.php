<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Subscription
{
    public ?string $id;
    public ?string $customer_id;
    public ?string $product_id;
    public ?array $add_ons;
    public ?int $start_at;
    public ?int $end_at;
    public ?int $create_at;
    public ?int $seats;
    public ?string $dns;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->customer_id = $data['customer_id'];
        $this->product_id = $data['product_id'];
        $this->add_ons = $data['add_ons'];
        $this->start_at = $data['start_at'];
        $this->end_at = $data['end_at'];
        $this->create_at = $data['create_at'];
        $this->seats = $data['seats'];
        $this->dns = $data['dns'];
        return $this;
    }
}
