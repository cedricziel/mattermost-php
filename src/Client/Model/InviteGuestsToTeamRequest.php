<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class InviteGuestsToTeamRequest
{
    public function __construct(
        /** List of emails */
        public array $emails,
        /** List of channel ids */
        public array $channels,
        /** Message to include in the invite */
        public ?string $message = null,
    ) {
    }
}
