<?php

namespace CedricZiel\MattermostPhp\Client;

class DataRetentionPolicyForChannel
{
    /** The channel ID. */
    public ?string $channel_id;

    /** The number of days a message will be retained before being deleted by this policy. */
    public ?int $post_duration;
}
;