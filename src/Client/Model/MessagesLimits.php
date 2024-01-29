<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MessagesLimits
{
    public function __construct(
        public ?int $history = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['history'] */
            if (isset($data['history'])) $this->history = $data['history'];
        return $this;
    }
}
