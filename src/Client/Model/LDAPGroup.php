<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A LDAP group
 */
class LDAPGroup
{
    public ?bool $has_syncables;
    public ?string $mattermost_group_id;
    public ?string $primary_key;
    public ?string $name;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->has_syncables = $data['has_syncables'];
        $this->mattermost_group_id = $data['mattermost_group_id'];
        $this->primary_key = $data['primary_key'];
        $this->name = $data['name'];
        return $this;
    }
}
