<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateTeamSchemeRequest
{
    public function __construct(
        /** The ID of the scheme. */
        public ?string $scheme_id = null,
    ) {
    }
}
