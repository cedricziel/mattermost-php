<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamsLimits
{
    public ?int $active;

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
