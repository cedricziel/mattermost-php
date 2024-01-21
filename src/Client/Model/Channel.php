<?php

namespace CedricZiel\MattermostPhp\Client;

class Channel
{
    public ?string $id;

    /** The time in milliseconds a channel was created */
    public ?int $create_at;

    /** The time in milliseconds a channel was last updated */
    public ?int $update_at;

    /** The time in milliseconds a channel was deleted */
    public ?int $delete_at;
    public ?string $team_id;
    public ?string $type;
    public ?string $display_name;
    public ?string $name;
    public ?string $header;
    public ?string $purpose;

    /** The time in milliseconds of the last post of a channel */
    public ?int $last_post_at;
    public ?int $total_msg_count;

    /** Deprecated in Mattermost 5.0 release */
    public ?int $extra_update_at;
    public ?string $creator_id;
}
;