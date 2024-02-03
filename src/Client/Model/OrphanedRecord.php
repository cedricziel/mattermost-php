<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * an object containing information about an orphaned record.
 */
class OrphanedRecord
{
    public function __construct(
        /** the id of the parent relation (table) entry. */
        public ?string $parent_id = null,
        /** the id of the child relation (table) entry. */
        public ?string $child_id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            parent_id: $data['parent_id'] ?? null,
            child_id: $data['child_id'] ?? null,
        );
        return $object;
    }
}
