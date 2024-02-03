<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LoginByCwsTokenRequest
{
    public function __construct(
        public ?string $login_id = null,
        public ?string $cws_token = null,
    ) {
    }
}
