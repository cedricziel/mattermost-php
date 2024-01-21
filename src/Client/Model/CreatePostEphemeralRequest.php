<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreatePostEphemeralRequest
{
    public function __construct(
        /** The target user id for the ephemeral post */
        public ?string $user_id = null,
        /** Post object to create */
        public \stdClass $post,
    ) {
    }
}
