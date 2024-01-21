<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MoveChannelRequest
{
    public function __construct(
        public ?string $team_id = null,
        /** Remove members those are not member of target team before moving the channel. */
        public ?bool $force = null,
    ) {
    }
}
