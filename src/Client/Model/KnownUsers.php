<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class KnownUsers
{
    public ?string $items;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->items = $data['items'];
        return $this;
    }
}
