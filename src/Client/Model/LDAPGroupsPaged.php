<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A paged list of LDAP groups
 */
class LDAPGroupsPaged
{
    public function __construct(
        /** Total number of groups */
        public ?\number $count = null,
        public ?array $groups = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var number $data['count'] */
            if (isset($data['count'])) $this->count = $data['count'];
        /** @var array $data['groups'] */
            if (isset($data['groups'])) $this->groups = $data['groups'];
        return $this;
    }
}
