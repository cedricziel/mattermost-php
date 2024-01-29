<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Installation
{
    public function __construct(
        /** A unique identifier */
        public ?string $id = null,
        public $allowed_ip_ranges = null,
        /** The current state of the installation */
        public ?string $state = null,
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
        /** @var  $data['allowed_ip_ranges'] */
            if (isset($data['allowed_ip_ranges'])) $this->allowed_ip_ranges = $data['allowed_ip_ranges'];
        /** @var string $data['state'] */
            if (isset($data['state'])) $this->state = $data['state'];
        return $this;
    }
}
