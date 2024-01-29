<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamExists
{
    public function __construct(
        public ?bool $exists = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var bool $data['exists'] */
            if (isset($data['exists'])) $this->exists = $data['exists'];
        return $this;
    }
}
