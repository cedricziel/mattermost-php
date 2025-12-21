<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateScheduledPostRequest
{
    public function __construct(
        /** ID of the scheduled post to update */
        public string $id,
        /** The channel ID to post in */
        public string $channel_id,
        /** The current user ID */
        public string $user_id,
        /** UNIX timestamp in milliseconds of the time when the scheduled post should be sent */
        public int $scheduled_at,
        /** The message contents, can be formatted with Markdown */
        public string $message,
    ) {
    }
}
