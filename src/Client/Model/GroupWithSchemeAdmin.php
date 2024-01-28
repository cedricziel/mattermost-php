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
        /** @var  $data['group'] */
        if (isset($data['group'])) $this->group = $data['group'];
        /** @var bool $data['scheme_admin'] */
        if (isset($data['scheme_admin'])) $this->scheme_admin = $data['scheme_admin'];
        return $this;
    }
}
