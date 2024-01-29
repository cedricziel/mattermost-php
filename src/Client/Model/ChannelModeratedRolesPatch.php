<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeratedRolesPatch
{
    public function __construct(
        public ?bool $guests = null,
        public ?bool $members = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var bool $data['guests'] */
            if (isset($data['guests'])) $this->guests = $data['guests'];
        /** @var bool $data['members'] */
            if (isset($data['members'])) $this->members = $data['members'];
        return $this;
    }
}
