<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MigrateAuthToLdapRequest
{
    public function __construct(
        /** The current authentication type for the matched users. */
        public string $from,
        /** Foreign user field name to match. */
        public string $match_field,
        public bool $force,
    ) {
    }
}
