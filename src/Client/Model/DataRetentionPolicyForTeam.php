<?php

namespace CedricZiel\MattermostPhp\Client;

class DataRetentionPolicyForTeam
{
    /** The team ID. */
    public ?string $team_id;

    /** The number of days a message will be retained before being deleted by this policy. */
    public ?int $post_duration;
}
;