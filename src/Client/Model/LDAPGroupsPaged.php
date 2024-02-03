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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            count: $data['count'] ?? null,
            groups: $data['groups'] ?? null,
        );
        return $object;
    }
}
