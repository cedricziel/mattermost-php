<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamExists
{
    public ?bool $exists;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->exists = $data['exists'];
        return $this;
    }
}
