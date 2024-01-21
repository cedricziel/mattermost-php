<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreatePostRequest
{
    public function __construct(
        /** The channel ID to post in */
        public ?string $channel_id = null,
        /** The message contents, can be formatted with Markdown */
        public ?string $message = null,
        /** The post ID to comment on */
        public ?string $root_id = null,
        /** A list of file IDs to associate with the post. Note that posts are limited to 5 files maximum. Please use additional posts for more files. */
        public ?array $file_ids = null,
        /** A general JSON property bag to attach to the post */
        public ?\stdClass $props = null,
        /** A JSON object to add post metadata, e.g the post's priority */
        public ?\stdClass $metadata = null,
    ) {
    }
}
