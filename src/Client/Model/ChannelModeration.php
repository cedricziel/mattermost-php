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
        /** @var string $data['name'] */
        if (isset($data['name'])) $this->name = $data['name'];
        /** @var  $data['roles'] */
        if (isset($data['roles'])) $this->roles = $data['roles'];
        return $this;
    }
}
