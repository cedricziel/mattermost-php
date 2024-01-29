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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['type'] */
            if (isset($data['type'])) $this->type = $data['type'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['start_at'] */
            if (isset($data['start_at'])) $this->start_at = $data['start_at'];
        /** @var int $data['last_activity_at'] */
            if (isset($data['last_activity_at'])) $this->last_activity_at = $data['last_activity_at'];
        /** @var string $data['status'] */
            if (isset($data['status'])) $this->status = $data['status'];
        /** @var int $data['progress'] */
            if (isset($data['progress'])) $this->progress = $data['progress'];
        /** @var stdClass $data['data'] */
            if (isset($data['data'])) $this->data = (object) $data['data'];
        return $this;
    }
}
