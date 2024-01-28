<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeratedRolesPatch
{
    public ?bool $guests;
    public ?bool $members;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->guests = $data['guests'];
        $this->members = $data['members'];
        return $this;
    }
}
