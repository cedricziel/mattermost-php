<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeration
{
    public ?string $name;
    public $roles;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->name = $data['name'];
        $this->roles = $data['roles'];
        return $this;
    }
}
