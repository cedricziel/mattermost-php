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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Job The hydrated instance
     */
    public static function hydrate(?array $data): Job
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            type: $data['type'] ?? null,
            create_at: $data['create_at'] ?? null,
            start_at: $data['start_at'] ?? null,
            last_activity_at: $data['last_activity_at'] ?? null,
            status: $data['status'] ?? null,
            progress: $data['progress'] ?? null,
            data: isset($data['data']) ? (object) $data['data'] : null,
        );
    }
}
