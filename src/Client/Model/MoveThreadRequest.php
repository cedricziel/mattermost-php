<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MoveThreadRequest
{
    public function __construct(
        /** The channel identifier of where the post/thread is to be moved */
        public string $channel_id,
    ) {
    }
}
