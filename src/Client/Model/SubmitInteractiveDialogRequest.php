<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SubmitInteractiveDialogRequest
{
    public function __construct(
        /** The URL to send the submitted dialog payload to */
        public ?string $url = null,
        /** Channel ID the user submitted the dialog from */
        public ?string $channel_id = null,
        /** Team ID the user submitted the dialog from */
        public ?string $team_id = null,
        /** String map where keys are element names and values are the element input values */
        public ?\stdClass $submission = null,
        /** Callback ID sent when the dialog was opened */
        public ?string $callback_id = null,
        /** State sent when the dialog was opened */
        public ?string $state = null,
        /** Set to true if the dialog was cancelled */
        public ?bool $cancelled = null,
    ) {
    }
}
