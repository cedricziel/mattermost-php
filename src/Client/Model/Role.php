<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Role
{
    /** The unique identifier of the role. */
    public ?string $id;

    /** The unique name of the role, used when assigning roles to users/groups in contexts. */
    public ?string $name;

    /** The human readable name for the role. */
    public ?string $display_name;

    /** A human readable description of the role. */
    public ?string $description;

    /** A list of the unique names of the permissions this role grants. */
    public ?array $permissions;

    /** indicates if this role is managed by a scheme (true), or is a custom stand-alone role (false). */
    public ?bool $scheme_managed;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->display_name = $data['display_name'];
        $this->description = $data['description'];
        $this->permissions = $data['permissions'];
        $this->scheme_managed = $data['scheme_managed'];
        return $this;
    }
}
