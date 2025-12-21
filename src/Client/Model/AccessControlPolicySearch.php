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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): AccessControlPolicySearch {
        $object = new self(
            term: isset($data['term']) ? $data['term'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            parent_id: isset($data['parent_id']) ? $data['parent_id'] : null,
            ids: isset($data['ids']) ? $data['ids'] : null,
            active: isset($data['active']) ? $data['active'] : null,
            include_children: isset($data['include_children']) ? $data['include_children'] : null,
            cursor: isset($data['cursor']) ? $data['cursor'] : null,
            limit: isset($data['limit']) ? $data['limit'] : null,
        );
        return $object;
    }
}
