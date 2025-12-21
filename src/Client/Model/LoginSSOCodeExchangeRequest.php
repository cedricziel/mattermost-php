<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LoginSSOCodeExchangeRequest
{
    public function __construct(
        /** Short-lived one-time code from SSO callback */
        public string $login_code,
        /** SAML verifier to prove code possession */
        public string $code_verifier,
        /** State parameter to prevent CSRF attacks */
        public string $state,
    ) {
    }
}
