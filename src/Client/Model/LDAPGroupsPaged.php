<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A paged list of LDAP groups
 */
class LDAPGroupsPaged
{
    /** Total number of groups */
    public ?\number $count;
    public ?array $groups;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->count = $data['count'];
        $this->groups = $data['groups'];
        return $this;
    }
}
