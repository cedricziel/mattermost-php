<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamsLimits
{
    public ?int $active;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->active = $data['active'];
        return $this;
    }
}
