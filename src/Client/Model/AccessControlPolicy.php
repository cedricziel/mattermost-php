<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicy
{
    public function __construct(
        /** The unique identifier of the policy. */
        public ?string $id = null,
        /** The unique name for the policy. */
        public ?string $name = null,
        /** The human-readable name for the policy. */
        public ?string $display_name = null,
        /** A description of the policy. */
        public ?string $description = null,
        /** The CEL expression defining the policy rules. */
        public ?string $expression = null,
        /** Whether the policy is currently active and enforced. */
        public ?bool $is_active = null,
        /** The time in milliseconds the policy was created. */
        public ?int $create_at = null,
        /** The time in milliseconds the policy was last updated. */
        public ?int $update_at = null,
        /** The time in milliseconds the policy was deleted. */
        public ?int $delete_at = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AccessControlPolicy The hydrated instance
     */
    public static function hydrate(?array $data): AccessControlPolicy
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            display_name: $data['display_name'] ?? null,
            description: $data['description'] ?? null,
            expression: $data['expression'] ?? null,
            is_active: $data['is_active'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
        );
    }
}
