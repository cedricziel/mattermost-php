<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeratedRoles
{
    public $guests;
    public $members;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->guests = $data['guests'];
        $this->members = $data['members'];
        return $this;
    }
}
