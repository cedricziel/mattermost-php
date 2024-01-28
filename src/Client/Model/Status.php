<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Status
{
    public ?string $user_id;
    public ?string $status;
    public ?bool $manual;
    public ?int $last_activity_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->user_id = $data['user_id'];
        $this->status = $data['status'];
        $this->manual = $data['manual'];
        $this->last_activity_at = $data['last_activity_at'];
        return $this;
    }
}
