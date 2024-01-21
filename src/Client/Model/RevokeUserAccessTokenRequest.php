<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RevokeUserAccessTokenRequest
{
    public function __construct(
        /** The user access token GUID to revoke */
        public ?string $token_id = null,
    ) {
    }
}
