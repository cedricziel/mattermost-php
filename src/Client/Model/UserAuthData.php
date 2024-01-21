<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAuthData
{
    /** Service-specific authentication data */
    public ?string $auth_data;

    /** The authentication service such as "email", "gitlab", or "ldap" */
    public ?string $auth_service;
}
;