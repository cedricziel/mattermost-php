<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetLoginTypeRequest
{
    public function __construct(
        /** The user ID (optional, can be used with login_id) */
        public ?string $id = null,
        /** The login ID (email, username, or unique identifier) */
        public ?string $login_id = null,
        /** The device ID for audit logging purposes */
        public ?string $device_id = null,
    ) {
    }
}
