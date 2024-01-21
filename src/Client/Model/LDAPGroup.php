<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A LDAP group
 */
class LDAPGroup
{
    public ?bool $has_syncables;
    public ?string $mattermost_group_id;
    public ?string $primary_key;
    public ?string $name;
}
