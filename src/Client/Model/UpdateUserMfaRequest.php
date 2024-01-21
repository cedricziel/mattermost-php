<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateUserMfaRequest
{
    public function __construct(
        /** Use `true` to activate, `false` to deactivate */
        public ?bool $activate = null,
        /** The code produced by your MFA client. Required if `activate` is true */
        public ?string $code = null,
    ) {
    }
}
