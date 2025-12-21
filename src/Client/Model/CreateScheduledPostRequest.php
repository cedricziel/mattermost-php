<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateScheduledPostRequest
{
    public function __construct(
        /** UNIX timestamp in milliseconds of the time when the scheduled post should be sent */
        public int $scheduled_at,
        /** The channel ID to post in */
        public string $channel_id,
        /** The message contents, can be formatted with Markdown */
        public string $message,
        /** The post ID to comment on */
        public ?string $root_id = null,
        /** A list of file IDs to associate with the post. Note that posts are limited to 5 files maximum. Please use additional posts for more files. */
        public ?array $file_ids = null,
        /** A general JSON property bag to attach to the post */
        public ?\stdClass $props = null,
    ) {
    }
}
