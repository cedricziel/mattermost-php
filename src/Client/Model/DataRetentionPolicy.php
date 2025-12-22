<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicy extends DataRetentionPolicyWithoutId
{
    public function __construct(
        ?string $display_name = null,
        ?int $post_duration = null,
        /** The ID of this retention policy. */
        public ?string $id = null,
    ) {
        parent::__construct(display_name: $display_name, post_duration: $post_duration);
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): DataRetentionPolicy {
        $object = new self(
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            post_duration: isset($data['post_duration']) ? $data['post_duration'] : null,
            id: isset($data['id']) ? $data['id'] : null,
        );
        return $object;
    }
}
