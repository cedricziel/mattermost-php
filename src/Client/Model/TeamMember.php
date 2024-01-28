<?php

namespace CedricZiel\MattermostPhp\Client\Model;

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

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->team_id = $data['team_id'];
        $this->user_id = $data['user_id'];
        $this->roles = $data['roles'];
        $this->delete_at = $data['delete_at'];
        $this->scheme_user = $data['scheme_user'];
        $this->scheme_admin = $data['scheme_admin'];
        $this->explicit_roles = $data['explicit_roles'];
        return $this;
    }
}
