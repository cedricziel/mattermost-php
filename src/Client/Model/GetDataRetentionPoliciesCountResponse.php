<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetDataRetentionPoliciesCountResponse
{
    public function __construct(
        /** The number of granular retention policies. */
        public ?int $total_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GetDataRetentionPoliciesCountResponse The hydrated instance
     */
    public static function hydrate(?array $data): GetDataRetentionPoliciesCountResponse
    {
        $data ??= [];

        return new self(
            total_count: $data['total_count'] ?? null,
        );
    }
}
