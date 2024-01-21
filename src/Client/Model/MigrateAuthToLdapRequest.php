<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MigrateAuthToLdapRequest
{
    public function __construct(
        /** The current authentication type for the matched users. */
        public ?string $from = null,
        /** Foreign user field name to match. */
        public ?string $match_field = null,
        public ?bool $force = null,
    ) {
    }
}
