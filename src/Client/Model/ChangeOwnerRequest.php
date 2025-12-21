<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChangeOwnerRequest
{
    public function __construct(
        /** The user ID of the new owner. */
        public string $owner_id,
    ) {
    }
}
