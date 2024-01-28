<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateJobRequest
{
    public function __construct(
        /** The type of job to create */
        public string $type,
        /** An object containing any additional data required for this job type */
        public ?\stdClass $data = null,
    ) {
    }
}
