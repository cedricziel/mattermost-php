<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * an object containing information about an orphaned record.
 */
class OrphanedRecord
{
    /** the id of the parent relation (table) entry. */
    public ?string $parent_id;

    /** the id of the child relation (table) entry. */
    public ?string $child_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['parent_id'] */
        if (isset($data['parent_id'])) $this->parent_id = $data['parent_id'];
        /** @var string $data['child_id'] */
        if (isset($data['child_id'])) $this->child_id = $data['child_id'];
        return $this;
    }
}
