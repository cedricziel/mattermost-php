<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * an object containing the results of a relational integrity check.
 */
class RelationalIntegrityCheckData
{
    /** the name of the parent relation (table). */
    public ?string $parent_name;

    /** the name of the child relation (table). */
    public ?string $child_name;

    /** the name of the attribute (column) containing the parent id. */
    public ?string $parent_id_attr;

    /** the name of the attribute (column) containing the child id. */
    public ?string $child_id_attr;

    /** the list of orphaned records found. */
    public ?array $records;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['parent_name'] */
        if (isset($data['parent_name'])) $this->parent_name = $data['parent_name'];
        /** @var string $data['child_name'] */
        if (isset($data['child_name'])) $this->child_name = $data['child_name'];
        /** @var string $data['parent_id_attr'] */
        if (isset($data['parent_id_attr'])) $this->parent_id_attr = $data['parent_id_attr'];
        /** @var string $data['child_id_attr'] */
        if (isset($data['child_id_attr'])) $this->child_id_attr = $data['child_id_attr'];
        /** @var array $data['records'] */
        if (isset($data['records'])) $this->records = $data['records'];
        return $this;
    }
}
