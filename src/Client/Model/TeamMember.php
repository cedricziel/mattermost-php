<?php

namespace CedricZiel\MattermostPhp\Client;

class TeamMember
{
    /** The ID of the team this member belongs to. */
    public ?string $team_id;

    /** The ID of the user this member relates to. */
    public ?string $user_id;

    /** The complete list of roles assigned to this team member, as a space-separated list of role names, including any roles granted implicitly through permissions schemes. */
    public ?string $roles;

    /** The time in milliseconds that this team member was deleted. */
    public ?int $delete_at;

    /** Whether this team member holds the default user role defined by the team's permissions scheme. */
    public ?bool $scheme_user;

    /** Whether this team member holds the default admin role defined by the team's permissions scheme. */
    public ?bool $scheme_admin;

    /** The list of roles explicitly assigned to this team member, as a space separated list of role names. This list does *not* include any roles granted implicitly through permissions schemes. */
    public ?string $explicit_roles;
}
;