<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * group augmented with scheme admin information
 */
class GroupWithSchemeAdmin
{
    public function __construct(
        public $group = null,
        public ?bool $scheme_admin = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GroupWithSchemeAdmin The hydrated instance
     */
    public static function hydrate(?array $data): GroupWithSchemeAdmin
    {
        $data ??= [];

        return new self(
            group: $data['group'] ?? null,
            scheme_admin: $data['scheme_admin'] ?? null,
        );
    }
}
