<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MigrateAuthToSamlRequest
{
    public function __construct(
        /** The current authentication type for the matched users. */
        public string $from,
        /** Users map. */
        public \stdClass $matches,
        public bool $auto,
    ) {
    }
}
