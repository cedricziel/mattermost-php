<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddChannelMemberRequest
{
    public function __construct(
        /** The ID of user to add into the channel, for backwards compatibility. */
        public ?string $user_id = null,
        /** The IDs of users to add into the channel, required if 'user_id' doess not exist. */
        public ?array $user_ids = null,
        /** The ID of root post where link to add channel member originates */
        public ?string $post_root_id = null,
    ) {
    }
}
