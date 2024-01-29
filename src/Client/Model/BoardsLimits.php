<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class BoardsLimits
{
    public function __construct(
        public ?int $cards = null,
        public ?int $views = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['cards'] */
            if (isset($data['cards'])) $this->cards = $data['cards'];
        /** @var int $data['views'] */
            if (isset($data['views'])) $this->views = $data['views'];
        return $this;
    }
}
