<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicySearch
{
    public function __construct(
        /** The search term to match against policy names or display names. */
        public ?string $term = null,
        /** The type of policy (e.g., 'parent' or 'channel'). */
        public ?string $type = null,
        /** The ID of the parent policy to search within. */
        public ?string $parent_id = null,
        /** List of policy IDs to filter by. */
        public ?array $ids = null,
        /** Filter policies by active status. */
        public ?bool $active = null,
        /** Whether to include child policies in the result. */
        public ?bool $include_children = null,
        public $cursor = null,
        /** The maximum number of policies to return. */
        public ?int $limit = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AccessControlPolicySearch The hydrated instance
     */
    public static function hydrate(?array $data): AccessControlPolicySearch
    {
        $data ??= [];

        return new self(
            term: $data['term'] ?? null,
            type: $data['type'] ?? null,
            parent_id: $data['parent_id'] ?? null,
            ids: $data['ids'] ?? null,
            active: $data['active'] ?? null,
            include_children: $data['include_children'] ?? null,
            cursor: $data['cursor'] ?? null,
            limit: $data['limit'] ?? null,
        );
    }
}
