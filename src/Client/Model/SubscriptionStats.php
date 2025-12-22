<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SubscriptionStats
{
    public function __construct(
        public ?int $remaining_seats = null,
        public ?string $is_paid_tier = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return SubscriptionStats The hydrated instance
     */
    public static function hydrate(?array $data): SubscriptionStats
    {
        $data ??= [];

        return new self(
            remaining_seats: $data['remaining_seats'] ?? null,
            is_paid_tier: $data['is_paid_tier'] ?? null,
        );
    }
}
