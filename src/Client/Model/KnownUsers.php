<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class KnownUsers
{
    public ?string $items;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['items'] */
        if (isset($data['items'])) $this->items = $data['items'];
        return $this;
    }
}
