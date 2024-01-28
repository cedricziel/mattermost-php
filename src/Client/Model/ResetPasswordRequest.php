<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ResetPasswordRequest
{
    public function __construct(
        /** The recovery code */
        public string $code,
        /** The new password for the user */
        public string $new_password,
    ) {
    }
}
