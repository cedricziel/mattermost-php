<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateRemoteClusterRequest
{
    public function __construct(
        public string $name,
        public string $default_team_id,
        public ?string $display_name = null,
        /**
         * The password to use in the invite code. If empty,
         * the server will generate one and it will be part
         * of the response
         */
        public ?string $password = null,
    ) {
    }
}
