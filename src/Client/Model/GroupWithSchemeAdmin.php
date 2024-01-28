<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * group augmented with scheme admin information
 */
class GroupWithSchemeAdmin
{
    public $group;
    public ?bool $scheme_admin;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->group = $data['group'];
        $this->scheme_admin = $data['scheme_admin'];
        return $this;
    }
}
