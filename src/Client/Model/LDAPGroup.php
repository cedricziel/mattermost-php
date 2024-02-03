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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            has_syncables: $data['has_syncables'] ?? null,
            mattermost_group_id: $data['mattermost_group_id'] ?? null,
            primary_key: $data['primary_key'] ?? null,
            name: $data['name'] ?? null,
        );
        return $object;
    }
}
