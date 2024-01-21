<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddGroupMembersRequest
{
    public function __construct(
        public ?array $user_ids = null,
    ) {
    }
}
