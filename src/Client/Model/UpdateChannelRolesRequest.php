<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateChannelRolesRequest
{
    public function __construct(
        public ?string $roles = null,
    ) {
    }
}
