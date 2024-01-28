<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Installation
{
    /** A unique identifier */
    public ?string $id;
    public $allowed_ip_ranges;

    /** The current state of the installation */
    public ?string $state;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->allowed_ip_ranges = $data['allowed_ip_ranges'];
        $this->state = $data['state'];
        return $this;
    }
}
