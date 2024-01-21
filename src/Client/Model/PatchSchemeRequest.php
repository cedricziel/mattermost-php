<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchSchemeRequest
{
    public function __construct(
        /** The human readable name of the scheme */
        public ?string $name = null,
        /** The description of the scheme */
        public ?string $description = null,
    ) {
    }
}
