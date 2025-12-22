<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RetentionPolicyForChannelList
{
    public function __construct(
        /** The list of channel policies. */
        public ?array $policies = null,
        /** The total number of channel policies. */
        public ?int $total_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return RetentionPolicyForChannelList The hydrated instance
     */
    public static function hydrate(?array $data): RetentionPolicyForChannelList
    {
        $data ??= [];

        return new self(
            policies: $data['policies'] ?? null,
            total_count: $data['total_count'] ?? null,
        );
    }
}
