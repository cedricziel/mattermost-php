<?php

namespace CedricZiel\MattermostPhp\Client;

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
}
;