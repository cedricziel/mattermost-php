<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MigrateIdLdapRequest
{
    public function __construct(
        /** New IdAttribute value */
        public string $toAttribute,
    ) {
    }
}
