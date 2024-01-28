<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateTeamMemberRolesRequest
{
    public function __construct(
        public string $roles,
    ) {
    }
}
