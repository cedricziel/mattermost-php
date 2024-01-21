<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CheckUserMfaRequest
{
    public function __construct(
        /** The email or username used to login */
        public ?string $login_id = null,
    ) {
    }
}
