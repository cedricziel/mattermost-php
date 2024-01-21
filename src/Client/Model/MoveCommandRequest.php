<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MoveCommandRequest
{
    public function __construct(
        /** Destination teamId */
        public ?string $team_id = null,
    ) {
    }
}
