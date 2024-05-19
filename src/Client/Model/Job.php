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
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            start_at: isset($data['start_at']) ? $data['start_at'] : null,
            last_activity_at: isset($data['last_activity_at']) ? $data['last_activity_at'] : null,
            status: isset($data['status']) ? $data['status'] : null,
            progress: isset($data['progress']) ? $data['progress'] : null,
            data: isset($data['data']) ? (object) $data['data'] : null,
        );
        return $object;
    }
}
