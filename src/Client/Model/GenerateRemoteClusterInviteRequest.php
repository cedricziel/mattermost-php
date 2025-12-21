<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GenerateRemoteClusterInviteRequest
{
    public function __construct(
        /** The password to encrypt the invite code with. */
        public string $password,
    ) {
    }
}
