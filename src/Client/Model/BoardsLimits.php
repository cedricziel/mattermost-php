<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class BoardsLimits
{
    public ?int $cards;
    public ?int $views;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->cards = $data['cards'];
        $this->views = $data['views'];
        return $this;
    }
}
