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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): DataRetentionPolicyWithoutId {
        $object = new self(
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            post_duration: isset($data['post_duration']) ? $data['post_duration'] : null,
        );
        return $object;
    }
}
