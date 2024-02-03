<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RevokeSessionRequest
{
    public function __construct(
        /** The session GUID to revoke. */
        public string $session_id,
    ) {
    }
}
