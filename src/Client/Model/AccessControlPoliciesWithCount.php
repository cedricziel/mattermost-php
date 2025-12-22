<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPoliciesWithCount
{
    public function __construct(
        public ?array $policies = null,
        /** The total number of policies. */
        public ?int $total_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AccessControlPoliciesWithCount The hydrated instance
     */
    public static function hydrate(?array $data): AccessControlPoliciesWithCount
    {
        $data ??= [];

        return new self(
            policies: $data['policies'] ?? null,
            total_count: $data['total_count'] ?? null,
        );
    }
}
