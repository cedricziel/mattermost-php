<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class InviteUsersToTeamRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
