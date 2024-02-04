<?php

namespace CedricZiel\MattermostPhp\Apps;

class Team
{
    public function __construct(
        public string $id,
        public int $create_at,
        public int $update_at,
        public int $delete_at,
        public string $display_name,
        public string $name,
        public string $description,
        public string $email,
        public string $type,
        public string $company_name,
        public string $allowed_domains,
        public string $invite_id,
        public bool $allow_open_invite,
        public ?string $scheme_id,
        public ?string $group_constrained,
        public ?string $policy_id,
        public ?bool $cloud_limits_archived = false,
    ){
    }
}
