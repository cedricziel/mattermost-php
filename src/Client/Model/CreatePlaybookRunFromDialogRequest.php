<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreatePlaybookRunFromDialogRequest
{
    public function __construct(
        public ?string $type = null,
        public ?string $url = null,
        /** Callback ID provided by the integration. */
        public ?string $callback_id = null,
        /** Stringified JSON with the post_id and the client_id. */
        public ?string $state = null,
        /** ID of the user who submitted the dialog. */
        public ?string $user_id = null,
        /** ID of the channel the user was in when submitting the dialog. */
        public ?string $channel_id = null,
        /** ID of the team the user was on when submitting the dialog. */
        public ?string $team_id = null,
        /** Map of the dialog fields to their values */
        public ?\stdClass $submission = null,
        /** If the dialog was cancelled. */
        public ?bool $cancelled = null,
    ) {
    }
}
