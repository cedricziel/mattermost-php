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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            roles: isset($data['roles']) ? $data['roles'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            scheme_user: isset($data['scheme_user']) ? $data['scheme_user'] : null,
            scheme_admin: isset($data['scheme_admin']) ? $data['scheme_admin'] : null,
            explicit_roles: isset($data['explicit_roles']) ? $data['explicit_roles'] : null,
        );
        return $object;
    }
}
