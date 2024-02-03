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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            type: isset($data['type']) ? $data['type'] : null,
            last_four: isset($data['last_four']) ? $data['last_four'] : null,
            exp_month: isset($data['exp_month']) ? $data['exp_month'] : null,
            exp_year: isset($data['exp_year']) ? $data['exp_year'] : null,
            card_brand: isset($data['card_brand']) ? $data['card_brand'] : null,
            name: isset($data['name']) ? $data['name'] : null,
        );
        return $object;
    }
}
