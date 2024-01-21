<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdatePostRequest
{
    public function __construct(
        /** ID of the post to update */
        public ?string $id = null,
        /** Set to `true` to pin the post to the channel it is in */
        public ?bool $is_pinned = null,
        /** The message text of the post */
        public ?string $message = null,
        /** Set to `true` if the post has reactions to it */
        public ?bool $has_reactions = null,
        /** A general JSON property bag to attach to the post */
        public ?string $props = null,
    ) {
    }
}
