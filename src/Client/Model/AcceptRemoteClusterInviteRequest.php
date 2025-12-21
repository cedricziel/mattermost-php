<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AcceptRemoteClusterInviteRequest
{
    public function __construct(
        public string $invite,
        public string $name,
        public string $default_team_id,
        /** The password to decrypt the invite code. */
        public string $password,
        public ?string $display_name = null,
    ) {
    }
}
