<?php

namespace CedricZiel\MattermostPhp\Client;

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
}
;