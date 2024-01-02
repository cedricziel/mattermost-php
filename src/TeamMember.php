<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class TeamMember
{
    public function __construct(
        #[SerializedName('team_id')]
        protected string $team_id,
        #[SerializedName('user_id')]
        protected string $user_id,
        #[SerializedName('roles')]
        protected string $roles,
        #[SerializedName('delete_at')]
        protected int $delete_at,
        #[SerializedName('scheme_guest')]
        protected bool $scheme_guest,
        #[SerializedName('scheme_user')]
        protected bool $scheme_user,
        #[SerializedName('scheme_admin')]
        protected bool $scheme_admin,
        #[SerializedName('explicit_roles')]
        protected string $explicit_roles,
    ) {
    }
}
