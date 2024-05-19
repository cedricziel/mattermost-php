<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A paged list of LDAP groups
 */
class LDAPGroupsPaged
{
    public function __construct(
        /** Total number of groups */
        public ?int $count = null,
        public ?array $groups = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            count: isset($data['count']) ? $data['count'] : null,
            groups: isset($data['groups']) ? $data['groups'] : null,
        );
        return $object;
    }
}
