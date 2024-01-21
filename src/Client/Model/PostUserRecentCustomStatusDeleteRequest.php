<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostUserRecentCustomStatusDeleteRequest
{
    public function __construct(
        /** Any emoji */
        public ?string $emoji = null,
        /** Any custom status text */
        public ?string $text = null,
        /** Duration of custom status, can be `thirty_minutes`, `one_hour`, `four_hours`, `today`, `this_week` or `date_and_time` */
        public ?string $duration = null,
        /** The time at which custom status should be expired. It should be in ISO format. */
        public ?string $expires_at = null,
    ) {
    }
}
