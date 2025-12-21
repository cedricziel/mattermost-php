<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchRemoteClusterRequest
{
    public function __construct(
        public ?string $display_name = null,
        /** The team where channels from invites are created */
        public ?string $default_team_id = null,
    ) {
    }
}
