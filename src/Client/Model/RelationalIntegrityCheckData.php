<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * an object containing the results of a relational integrity check.
 */
class RelationalIntegrityCheckData
{
    public function __construct(
        /** the name of the parent relation (table). */
        public ?string $parent_name = null,
        /** the name of the child relation (table). */
        public ?string $child_name = null,
        /** the name of the attribute (column) containing the parent id. */
        public ?string $parent_id_attr = null,
        /** the name of the attribute (column) containing the child id. */
        public ?string $child_id_attr = null,
        /** the list of orphaned records found. */
        public ?array $records = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): RelationalIntegrityCheckData {
        $object = new self(
            parent_name: isset($data['parent_name']) ? $data['parent_name'] : null,
            child_name: isset($data['child_name']) ? $data['child_name'] : null,
            parent_id_attr: isset($data['parent_id_attr']) ? $data['parent_id_attr'] : null,
            child_id_attr: isset($data['child_id_attr']) ? $data['child_id_attr'] : null,
            records: isset($data['records']) ? $data['records'] : null,
        );
        return $object;
    }
}
