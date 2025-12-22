<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A LDAP group
 */
class LDAPGroup
{
    public function __construct(
        public ?bool $has_syncables = null,
        public ?string $mattermost_group_id = null,
        public ?string $primary_key = null,
        public ?string $name = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return LDAPGroup The hydrated instance
     */
    public static function hydrate(?array $data): LDAPGroup
    {
        $data ??= [];

        return new self(
            has_syncables: $data['has_syncables'] ?? null,
            mattermost_group_id: $data['mattermost_group_id'] ?? null,
            primary_key: $data['primary_key'] ?? null,
            name: $data['name'] ?? null,
        );
    }
}
