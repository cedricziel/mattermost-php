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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DataRetentionPolicy The hydrated instance
     */
    public static function hydrate(?array $data): DataRetentionPolicy
    {
        $data ??= [];

        return new self(
            display_name: $data['display_name'] ?? null,
            post_duration: $data['post_duration'] ?? null,
            id: $data['id'] ?? null,
        );
    }
}
