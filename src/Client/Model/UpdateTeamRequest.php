<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateTeamRequest
{
    public function __construct(
        public string $id,
        public string $display_name,
        public string $description,
        public string $company_name,
        public string $allowed_domains,
        public string $invite_id,
        public string $allow_open_invite,
    ) {
    }
}
