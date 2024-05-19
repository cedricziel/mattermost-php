<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SubscriptionStats
{
    public function __construct(
        public ?int $remaining_seats = null,
        public ?string $is_paid_tier = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            remaining_seats: isset($data['remaining_seats']) ? $data['remaining_seats'] : null,
            is_paid_tier: isset($data['is_paid_tier']) ? $data['is_paid_tier'] : null,
        );
        return $object;
    }
}
