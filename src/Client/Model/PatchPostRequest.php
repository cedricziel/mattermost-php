<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchPostRequest
{
    public function __construct(
        /** Set to `true` to pin the post to the channel it is in */
        public ?bool $is_pinned = null,
        /** The message text of the post */
        public ?string $message = null,
        /** The list of files attached to this post */
        public ?array $file_ids = null,
        /** Set to `true` if the post has reactions to it */
        public ?bool $has_reactions = null,
        /** A general JSON property bag to attach to the post */
        public ?string $props = null,
    ) {
    }
}
