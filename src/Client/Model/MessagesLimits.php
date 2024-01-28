<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MessagesLimits
{
    public ?int $history;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->history = $data['history'];
        return $this;
    }
}
