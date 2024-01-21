<?php

namespace CedricZiel\MattermostPhp\Client;

class Reaction
{
    /** The ID of the user that made this reaction */
    public ?string $user_id;

    /** The ID of the post to which this reaction was made */
    public ?string $post_id;

    /** The name of the emoji that was used for this reaction */
    public ?string $emoji_name;

    /** The time in milliseconds this reaction was made */
    public ?int $create_at;
}
;