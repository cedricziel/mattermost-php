<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateJobStatusRequest
{
    public function __construct(
        /** The status you want to set */
        public string $status,
        /** Set this to true to bypass status restrictions */
        public ?bool $force = null,
    ) {
    }
}
