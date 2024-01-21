<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OpenInteractiveDialogRequest
{
    public function __construct(
        /** Trigger ID provided by other action */
        public ?string $trigger_id = null,
        /** The URL to send the submitted dialog payload to */
        public ?string $url = null,
        /** Post object to create */
        public \stdClass $dialog,
    ) {
    }
}
