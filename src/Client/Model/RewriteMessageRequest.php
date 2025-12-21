<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RewriteMessageRequest
{
    public function __construct(
        /** The ID of the AI agent to use for rewriting */
        public string $agent_id,
        /** The message text to rewrite */
        public string $message,
        /** The rewrite action to perform */
        public string $action,
        /** Custom prompt for rewriting. Required when action is "custom", optional otherwise. */
        public ?string $custom_prompt = null,
    ) {
    }
}
