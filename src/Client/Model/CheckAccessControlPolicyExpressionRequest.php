<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CheckAccessControlPolicyExpressionRequest
{
    public function __construct(
        /** The expression to check. */
        public ?string $expression = null,
    ) {
    }
}
