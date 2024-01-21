<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateUserRolesRequest
{
    public function __construct(
        public ?string $roles = null,
    ) {
    }
}
