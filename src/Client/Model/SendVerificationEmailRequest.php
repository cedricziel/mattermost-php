<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SendVerificationEmailRequest
{
    public function __construct(
        /** Email of a user */
        public string $email,
    ) {
    }
}
