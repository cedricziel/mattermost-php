<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Subscription
{
    public function __construct(
        public ?string $id = null,
        public ?string $customer_id = null,
        public ?string $product_id = null,
        public ?array $add_ons = null,
        public ?int $start_at = null,
        public ?int $end_at = null,
        public ?int $create_at = null,
        public ?int $seats = null,
        public ?string $dns = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['customer_id'] */
            if (isset($data['customer_id'])) $this->customer_id = $data['customer_id'];
        /** @var string $data['product_id'] */
            if (isset($data['product_id'])) $this->product_id = $data['product_id'];
        /** @var array $data['add_ons'] */
            if (isset($data['add_ons'])) $this->add_ons = $data['add_ons'];
        /** @var int $data['start_at'] */
            if (isset($data['start_at'])) $this->start_at = $data['start_at'];
        /** @var int $data['end_at'] */
            if (isset($data['end_at'])) $this->end_at = $data['end_at'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['seats'] */
            if (isset($data['seats'])) $this->seats = $data['seats'];
        /** @var string $data['dns'] */
            if (isset($data['dns'])) $this->dns = $data['dns'];
        return $this;
    }
}
