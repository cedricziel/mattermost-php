<?php

namespace CedricZiel\MattermostPhp\Client;

class Scheme
{
    /** The unique identifier of the scheme. */
    public ?string $id;

    /** The human readable name for the scheme. */
    public ?string $name;

    /** A human readable description of the scheme. */
    public ?string $description;

    /** The time at which the scheme was created. */
    public ?int $create_at;

    /** The time at which the scheme was last updated. */
    public ?int $update_at;

    /** The time at which the scheme was deleted. */
    public ?int $delete_at;

    /** The scope to which this scheme can be applied, either "team" or "channel". */
    public ?string $scope;

    /** The id of the default team admin role for this scheme. */
    public ?string $default_team_admin_role;

    /** The id of the default team user role for this scheme. */
    public ?string $default_team_user_role;

    /** The id of the default channel admin role for this scheme. */
    public ?string $default_channel_admin_role;

    /** The id of the default channel user role for this scheme. */
    public ?string $default_channel_user_role;
}
;