<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MigrateAuthToSamlRequest
{
    public function __construct(
        /** The current authentication type for the matched users. */
        public ?string $from = null,
        /** Users map. */
        public ?\stdClass $matches = null,
        public ?bool $auto = null,
    ) {
    }
}
