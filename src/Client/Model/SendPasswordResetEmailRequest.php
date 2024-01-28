<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SendPasswordResetEmailRequest
{
    public function __construct(
        /** The email of the user */
        public string $email,
    ) {
    }
}
