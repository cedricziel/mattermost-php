<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicyTestResponse
{
    public function __construct(
        /** A list of users affected by the policy expression. */
        public ?array $users = null,
        /** The total number of users affected. */
        public ?int $total_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AccessControlPolicyTestResponse The hydrated instance
     */
    public static function hydrate(?array $data): AccessControlPolicyTestResponse
    {
        $data ??= [];

        return new self(
            users: $data['users'] ?? null,
            total_count: $data['total_count'] ?? null,
        );
    }
}
