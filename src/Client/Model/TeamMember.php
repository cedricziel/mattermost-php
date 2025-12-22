<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamMember
{
    public function __construct(
        /** The ID of the team this member belongs to. */
        public ?string $team_id = null,
        /** The ID of the user this member relates to. */
        public ?string $user_id = null,
        /** The complete list of roles assigned to this team member, as a space-separated list of role names, including any roles granted implicitly through permissions schemes. */
        public ?string $roles = null,
        /** The time in milliseconds that this team member was deleted. */
        public ?int $delete_at = null,
        /** Whether this team member holds the default user role defined by the team's permissions scheme. */
        public ?bool $scheme_user = null,
        /** Whether this team member holds the default admin role defined by the team's permissions scheme. */
        public ?bool $scheme_admin = null,
        /** The list of roles explicitly assigned to this team member, as a space separated list of role names. This list does *not* include any roles granted implicitly through permissions schemes. */
        public ?string $explicit_roles = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return TeamMember The hydrated instance
     */
    public static function hydrate(?array $data): TeamMember
    {
        $data ??= [];

        return new self(
            team_id: $data['team_id'] ?? null,
            user_id: $data['user_id'] ?? null,
            roles: $data['roles'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            scheme_user: $data['scheme_user'] ?? null,
            scheme_admin: $data['scheme_admin'] ?? null,
            explicit_roles: $data['explicit_roles'] ?? null,
        );
    }
}
