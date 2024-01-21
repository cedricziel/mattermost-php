<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateUserAccessTokenRequest
{
    public function __construct(
        /** A description of the token usage */
        public ?string $description = null,
    ) {
    }
}
