<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * A paged list of LDAP groups
 */
class LDAPGroupsPaged
{
    /** Total number of groups */
    public ?\number $count;
    public ?array $groups;
}
