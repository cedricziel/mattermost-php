<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchRoleRequest
{
    public function __construct(
        /** The permissions the role should grant. */
        public ?array $permissions = null,
    ) {
    }
}
