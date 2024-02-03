<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateChannelMemberSchemeRolesRequest
{
    public function __construct(
        public bool $scheme_admin,
        public bool $scheme_user,
    ) {
    }
}
