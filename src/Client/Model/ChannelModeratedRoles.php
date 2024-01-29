<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeratedRoles
{
    public function __construct(
        public $guests = null,
        public $members = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var  $data['guests'] */
            if (isset($data['guests'])) $this->guests = $data['guests'];
        /** @var  $data['members'] */
            if (isset($data['members'])) $this->members = $data['members'];
        return $this;
    }
}
