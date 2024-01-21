<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateCommandRequest
{
    public function __construct(
        /** Team ID to where the command should be created */
        public ?string $team_id = null,
        /** `'P'` for post request, `'G'` for get request */
        public ?string $method = null,
        /** Activation word to trigger the command */
        public ?string $trigger = null,
        /** The URL that the command will make the request */
        public ?string $url = null,
    ) {
    }
}
