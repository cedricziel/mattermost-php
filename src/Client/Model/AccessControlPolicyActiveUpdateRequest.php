<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicyActiveUpdateRequest
{
    public function __construct(
        public ?array $entries = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AccessControlPolicyActiveUpdateRequest The hydrated instance
     */
    public static function hydrate(?array $data): AccessControlPolicyActiveUpdateRequest
    {
        $data ??= [];

        return new self(
            entries: $data['entries'] ?? null,
        );
    }
}
