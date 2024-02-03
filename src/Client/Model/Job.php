<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Job
{
    public function __construct(
        /** The unique id of the job */
        public ?string $id = null,
        /** The type of job */
        public ?string $type = null,
        /** The time at which the job was created */
        public ?int $create_at = null,
        /** The time at which the job was started */
        public ?int $start_at = null,
        /** The last time at which the job had activity */
        public ?int $last_activity_at = null,
        /** The status of the job */
        public ?string $status = null,
        /** The progress (as a percentage) of the job */
        public ?int $progress = null,
        /** A freeform data field containing additional information about the job */
        public ?\stdClass $data = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            type: $data['type'] ?? null,
            create_at: $data['create_at'] ?? null,
            start_at: $data['start_at'] ?? null,
            last_activity_at: $data['last_activity_at'] ?? null,
            status: $data['status'] ?? null,
            progress: $data['progress'] ?? null,
            data: (object) $data['data'] ?? null,
        );
        return $object;
    }
}
