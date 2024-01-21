<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostAcknowledgement
{
    /** The ID of the user that made this acknowledgement. */
    public ?string $user_id;

    /** The ID of the post to which this acknowledgement was made. */
    public ?string $post_id;

    /** The time in milliseconds in which this acknowledgement was made. */
    public ?int $acknowledged_at;
}
;