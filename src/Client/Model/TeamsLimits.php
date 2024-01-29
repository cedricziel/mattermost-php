<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamsLimits
{
    public function __construct(
        public ?int $active = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['active'] */
            if (isset($data['active'])) $this->active = $data['active'];
        return $this;
    }
}
