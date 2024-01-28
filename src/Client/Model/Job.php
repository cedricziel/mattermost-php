<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Job
{
    /** The unique id of the job */
    public ?string $id;

    /** The type of job */
    public ?string $type;

    /** The time at which the job was created */
    public ?int $create_at;

    /** The time at which the job was started */
    public ?int $start_at;

    /** The last time at which the job had activity */
    public ?int $last_activity_at;

    /** The status of the job */
    public ?string $status;

    /** The progress (as a percentage) of the job */
    public ?int $progress;

    /** A freeform data field containing additional information about the job */
    public ?\stdClass $data;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->type = $data['type'];
        $this->create_at = $data['create_at'];
        $this->start_at = $data['start_at'];
        $this->last_activity_at = $data['last_activity_at'];
        $this->status = $data['status'];
        $this->progress = $data['progress'];
        $this->data = $data['data'];
        return $this;
    }
}
