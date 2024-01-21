<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookRunMetadata
{
    /** Name of the channel associated to the playbook run. */
    public ?string $channel_name;

    /** Display name of the channel associated to the playbook run. */
    public ?string $channel_display_name;

    /** Name of the team the playbook run is in. */
    public ?string $team_name;

    /** Number of users that have been members of the playbook run at any point. */
    public ?int $num_members;

    /** Number of posts in the channel associated to the playbook run. */
    public ?int $total_posts;
}
