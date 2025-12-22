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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return OrphanedRecord The hydrated instance
     */
    public static function hydrate(?array $data): OrphanedRecord
    {
        $data ??= [];

        return new self(
            parent_id: $data['parent_id'] ?? null,
            child_id: $data['child_id'] ?? null,
        );
    }
}
