<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LookupInteractiveDialogRequest
{
    public function __construct(
        /** The URL to send the lookup request to */
        public string $url,
        /** Channel ID the user is performing the lookup from */
        public string $channel_id,
        /** Team ID the user is performing the lookup from */
        public string $team_id,
        /** String map where keys are element names and values are the element input values */
        public \stdClass $submission,
        /** Callback ID sent when the dialog was opened */
        public ?string $callback_id = null,
        /** State sent when the dialog was opened */
        public ?string $state = null,
    ) {
    }
}
