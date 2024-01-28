<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OpenInteractiveDialogRequest
{
    public function __construct(
        /** Trigger ID provided by other action */
        public string $trigger_id,
        /** The URL to send the submitted dialog payload to */
        public string $url,
        /** Post object to create */
        public \stdClass $dialog,
    ) {
    }
}
