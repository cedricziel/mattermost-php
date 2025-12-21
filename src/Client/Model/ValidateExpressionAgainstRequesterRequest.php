<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ValidateExpressionAgainstRequesterRequest
{
    public function __construct(
        /** The CEL expression to validate against the current user. */
        public string $expression,
        /** The channel ID for channel-specific permission checks (required for channel admins). */
        public ?string $channelId = null,
    ) {
    }
}
