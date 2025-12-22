<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicyActiveUpdate
{
    public function __construct(
        /** The ID of the policy. */
        public ?string $id = null,
        /** The active status of the policy. */
        public ?bool $active = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AccessControlPolicyActiveUpdate The hydrated instance
     */
    public static function hydrate(?array $data): AccessControlPolicyActiveUpdate
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            active: $data['active'] ?? null,
        );
    }
}
