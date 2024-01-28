<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateGroupRequest
{
    public function __construct(
        /** Group object to create. */
        public \stdClass $group,
        /** The user ids of the group members to add. */
        public array $user_ids,
    ) {
    }
}
