<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PublishUserTypingRequest
{
    public function __construct(
        /** The id of the channel to which to direct the typing event. */
        public ?string $channel_id = null,
        /** The optional id of the root post of the thread to which the user is replying. If unset, the typing event is directed at the entire channel. */
        public ?string $parent_id = null,
    ) {
    }
}
