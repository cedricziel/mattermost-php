<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateTeamMemberSchemeRolesRequest
{
    public function __construct(
        public ?bool $scheme_admin = null,
        public ?bool $scheme_user = null,
    ) {
    }
}
