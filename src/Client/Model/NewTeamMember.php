<?php

namespace CedricZiel\MattermostPhp\Client;

class NewTeamMember
{
    /** The user's ID. */
    public ?string $id;
    public ?string $username;
    public ?string $first_name;
    public ?string $last_name;
    public ?string $nickname;

    /** The user's position field value. */
    public ?string $position;

    /** The creation timestamp of the team member record. */
    public ?int $create_at;
}
;