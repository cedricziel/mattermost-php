<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LoginRequest
{
    public function __construct(
        public ?string $id = null,
        public ?string $login_id = null,
        public ?string $token = null,
        public ?string $device_id = null,
        public ?bool $ldap_only = null,
        /** The password used for email authentication. */
        public ?string $password = null,
        /** Magic link token for passwordless guest authentication. When provided, authenticates the user using the magic link token instead of password. Requires guest magic link feature to be enabled. */
        public ?string $magic_link_token = null,
    ) {
    }
}
