<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SubscriptionStats
{
    public ?int $remaining_seats;
    public ?string $is_paid_tier;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->remaining_seats = $data['remaining_seats'];
        $this->is_paid_tier = $data['is_paid_tier'];
        return $this;
    }
}
