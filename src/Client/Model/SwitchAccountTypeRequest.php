<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SwitchAccountTypeRequest
{
    public function __construct(
        /** The service the user currently uses to login */
        public string $current_service,
        /** The service the user will use to login */
        public string $new_service,
        /** The email of the user */
        public ?string $email = null,
        /** The password used with the current service */
        public ?string $password = null,
        /** The MFA code of the current service */
        public ?string $mfa_code = null,
        /** The LDAP/AD id of the user */
        public ?string $ldap_id = null,
    ) {
    }
}
