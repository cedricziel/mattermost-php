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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PaymentMethod The hydrated instance
     */
    public static function hydrate(?array $data): PaymentMethod
    {
        $data ??= [];

        return new self(
            type: $data['type'] ?? null,
            last_four: $data['last_four'] ?? null,
            exp_month: $data['exp_month'] ?? null,
            exp_year: $data['exp_year'] ?? null,
            card_brand: $data['card_brand'] ?? null,
            name: $data['name'] ?? null,
        );
    }
}
