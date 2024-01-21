<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateUserPasswordRequest
{
    public function __construct(
        /** The current password for the user */
        public ?string $current_password = null,
        /** The new password for the user */
        public ?string $new_password = null,
    ) {
    }
}
