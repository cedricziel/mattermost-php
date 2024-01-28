<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateUserRequest
{
    public function __construct(
        public string $email,
        public string $username,
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?string $nickname = null,
        /** Service-specific authentication data, such as email address. */
        public ?string $auth_data = null,
        /** The authentication service, one of "email", "gitlab", "ldap", "saml", "office365", "google", and "". */
        public ?string $auth_service = null,
        /** The password used for email authentication. */
        public ?string $password = null,
        public ?string $locale = null,
        public ?\stdClass $props = null,
        public $notify_props = null,
    ) {
    }
}
