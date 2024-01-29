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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var bool $data['has_syncables'] */
            if (isset($data['has_syncables'])) $this->has_syncables = $data['has_syncables'];
        /** @var string $data['mattermost_group_id'] */
            if (isset($data['mattermost_group_id'])) $this->mattermost_group_id = $data['mattermost_group_id'];
        /** @var string $data['primary_key'] */
            if (isset($data['primary_key'])) $this->primary_key = $data['primary_key'];
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        return $this;
    }
}
