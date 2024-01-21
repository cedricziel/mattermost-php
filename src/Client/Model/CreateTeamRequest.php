<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateTeamRequest
{
    public function __construct(
        /** Unique handler for a team, will be present in the team URL */
        public ?string $name = null,
        /** Non-unique UI name for the team */
        public ?string $display_name = null,
        /** `'O'` for open, `'I'` for invite only */
        public ?string $type = null,
    ) {
    }
}
