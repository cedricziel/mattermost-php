<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModerationPatch
{
    public ?string $name;
    public $roles;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->name = $data['name'];
        $this->roles = $data['roles'];
        return $this;
    }
}
