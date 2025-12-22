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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Role The hydrated instance
     */
    public static function hydrate(?array $data): Role
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            display_name: $data['display_name'] ?? null,
            description: $data['description'] ?? null,
            permissions: $data['permissions'] ?? null,
            scheme_managed: $data['scheme_managed'] ?? null,
        );
    }
}
