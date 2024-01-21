<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddChannelMemberRequest
{
    public function __construct(
        /** The ID of user to add into the channel */
        public ?string $user_id = null,
        /** The ID of root post where link to add channel member originates */
        public ?string $post_root_id = null,
    ) {
    }
}
