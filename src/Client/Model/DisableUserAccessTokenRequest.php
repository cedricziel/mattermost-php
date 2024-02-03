<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DisableUserAccessTokenRequest
{
    public function __construct(
        /** The personal access token GUID to disable */
        public string $token_id,
    ) {
    }
}
