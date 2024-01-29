<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SubscriptionStats
{
    public function __construct(
        public ?int $remaining_seats = null,
        public ?string $is_paid_tier = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['remaining_seats'] */
            if (isset($data['remaining_seats'])) $this->remaining_seats = $data['remaining_seats'];
        /** @var string $data['is_paid_tier'] */
            if (isset($data['is_paid_tier'])) $this->is_paid_tier = $data['is_paid_tier'];
        return $this;
    }
}
