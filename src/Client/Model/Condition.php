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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Condition The hydrated instance
     */
    public static function hydrate(?array $data): Condition
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            condition_expr: $data['condition_expr'] ?? null,
            version: $data['version'] ?? null,
            playbook_id: $data['playbook_id'] ?? null,
            run_id: $data['run_id'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
        );
    }
}
