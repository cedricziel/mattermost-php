<?php

namespace CedricZiel\MattermostPhp\Client;

class Team
{
    public ?string $id;

    /** The time in milliseconds a team was created */
    public ?int $create_at;

    /** The time in milliseconds a team was last updated */
    public ?int $update_at;

    /** The time in milliseconds a team was deleted */
    public ?int $delete_at;
    public ?string $display_name;
    public ?string $name;
    public ?string $description;
    public ?string $email;
    public ?string $type;
    public ?string $allowed_domains;
    public ?string $invite_id;
    public ?bool $allow_open_invite;

    /** The data retention policy to which this team has been assigned. If no such policy exists, or the caller does not have the `sysconsole_read_compliance_data_retention` permission, this field will be null. */
    public ?string $policy_id;
}
;