<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddTeamMemberRequest
{
    public function __construct(
        public ?string $team_id = null,
        public ?string $user_id = null,
    ) {
    }
}
