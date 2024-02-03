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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            channel_id: $data['channel_id'] ?? null,
            post_duration: $data['post_duration'] ?? null,
        );
        return $object;
    }
}
