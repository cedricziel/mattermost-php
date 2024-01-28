<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamExists
{
    public ?bool $exists;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->exists = $data['exists'];
        return $this;
    }
}
