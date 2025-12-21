<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class StatusRequest
{
    public function __construct(
        /** The status update message. */
        public string $message,
        /** The number of seconds until the system will send a reminder to the owner to update the status. No reminder will be scheduled if reminder is 0 or omitted. */
        public ?int $reminder = null,
    ) {
    }
}
