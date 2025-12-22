<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicyCursor
{
    public function __construct(
        /** The ID of the policy to start searching after. */
        public ?string $id = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AccessControlPolicyCursor The hydrated instance
     */
    public static function hydrate(?array $data): AccessControlPolicyCursor
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
        );
    }
}
