<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RequestTrialLicenseRequest
{
    public function __construct(
        /** Number of users requested (20% extra is going to be added) */
        public ?int $users = null,
    ) {
    }
}
