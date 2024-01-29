<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PaymentMethod
{
    public function __construct(
        public ?string $type = null,
        public ?int $last_four = null,
        public ?int $exp_month = null,
        public ?int $exp_year = null,
        public ?string $card_brand = null,
        public ?string $name = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['type'] */
            if (isset($data['type'])) $this->type = $data['type'];
        /** @var int $data['last_four'] */
            if (isset($data['last_four'])) $this->last_four = $data['last_four'];
        /** @var int $data['exp_month'] */
            if (isset($data['exp_month'])) $this->exp_month = $data['exp_month'];
        /** @var int $data['exp_year'] */
            if (isset($data['exp_year'])) $this->exp_year = $data['exp_year'];
        /** @var string $data['card_brand'] */
            if (isset($data['card_brand'])) $this->card_brand = $data['card_brand'];
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        return $this;
    }
}
