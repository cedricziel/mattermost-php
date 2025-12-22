<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyForChannel
{
    public function __construct(
        /** The channel ID. */
        public ?string $channel_id = null,
        /** The number of days a message will be retained before being deleted by this policy. */
        public ?int $post_duration = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DataRetentionPolicyForChannel The hydrated instance
     */
    public static function hydrate(?array $data): DataRetentionPolicyForChannel
    {
        $data ??= [];

        return new self(
            channel_id: $data['channel_id'] ?? null,
            post_duration: $data['post_duration'] ?? null,
        );
    }
}
