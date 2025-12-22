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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return LDAPGroupsPaged The hydrated instance
     */
    public static function hydrate(?array $data): LDAPGroupsPaged
    {
        $data ??= [];

        return new self(
            count: $data['count'] ?? null,
            groups: $data['groups'] ?? null,
        );
    }
}
