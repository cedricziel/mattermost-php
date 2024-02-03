<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DeleteGroupMembersRequest
{
    public function __construct(
        public ?array $user_ids = null,
    ) {
    }
}
