<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Role
{
    public function __construct(
        /** The unique identifier of the role. */
        public ?string $id = null,
        /** The unique name of the role, used when assigning roles to users/groups in contexts. */
        public ?string $name = null,
        /** The human readable name for the role. */
        public ?string $display_name = null,
        /** A human readable description of the role. */
        public ?string $description = null,
        /** A list of the unique names of the permissions this role grants. */
        public ?array $permissions = null,
        /** indicates if this role is managed by a scheme (true), or is a custom stand-alone role (false). */
        public ?bool $scheme_managed = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var array $data['permissions'] */
            if (isset($data['permissions'])) $this->permissions = $data['permissions'];
        /** @var bool $data['scheme_managed'] */
            if (isset($data['scheme_managed'])) $this->scheme_managed = $data['scheme_managed'];
        return $this;
    }
}
