<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyWithoutId
{
    public function __construct(
        /** The display name for this retention policy. */
        public ?string $display_name = null,
        /**
         * The number of days a message will be retained before being deleted by this policy. If this value is less than 0, the policy has infinite retention (i.e. messages are never deleted).
         */
        public ?int $post_duration = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DataRetentionPolicyWithoutId The hydrated instance
     */
    public static function hydrate(?array $data): DataRetentionPolicyWithoutId
    {
        $data ??= [];

        return new self(
            display_name: $data['display_name'] ?? null,
            post_duration: $data['post_duration'] ?? null,
        );
    }
}
