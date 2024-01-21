<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class EnableUserAccessTokenRequest
{
    public function __construct(
        /** The personal access token GUID to enable */
        public ?string $token_id = null,
    ) {
    }
}
