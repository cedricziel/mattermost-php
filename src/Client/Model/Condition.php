<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Condition
{
    public function __construct(
        /** A unique, 26 characters long, alphanumeric identifier for the condition. */
        public ?string $id = null,
        public $condition_expr = null,
        /** Version number of the condition expression format. Currently only version 1 is supported. */
        public ?int $version = null,
        /** The identifier of the playbook this condition belongs to. */
        public ?string $playbook_id = null,
        /** If this is a run condition (read-only snapshot), the identifier of the run. Empty for playbook conditions. */
        public ?string $run_id = null,
        /** The condition creation timestamp, formatted as the number of milliseconds since the Unix epoch. */
        public ?int $create_at = null,
        /** The condition update timestamp, formatted as the number of milliseconds since the Unix epoch. */
        public ?int $update_at = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): Condition {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            condition_expr: isset($data['condition_expr']) ? $data['condition_expr'] : null,
            version: isset($data['version']) ? $data['version'] : null,
            playbook_id: isset($data['playbook_id']) ? $data['playbook_id'] : null,
            run_id: isset($data['run_id']) ? $data['run_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
        );
        return $object;
    }
}
