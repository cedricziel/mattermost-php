<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class VerifyUserEmailRequest
{
    public function __construct(
        /** The token given to validate the email */
        public ?string $token = null,
    ) {
    }
}
