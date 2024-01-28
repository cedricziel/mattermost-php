<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateTeamMemberSchemeRolesRequest
{
    public function __construct(
        public bool $scheme_admin,
        public bool $scheme_user,
    ) {
    }
}
