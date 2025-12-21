<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateGroupRequest
{
    public function __construct(
        /** The unique group name used for at-mentioning. */
        public string $name,
        /** The display name of the group which can include spaces. */
        public string $display_name,
        /** Must be `custom` */
        public string $source,
        /** Must be true */
        public bool $allow_reference,
        /** The user ids of the group members to add. */
        public array $user_ids,
    ) {
    }
}
