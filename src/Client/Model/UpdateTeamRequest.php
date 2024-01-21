<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateTeamRequest
{
    public function __construct(
        public ?string $id = null,
        public ?string $display_name = null,
        public ?string $description = null,
        public ?string $company_name = null,
        public ?string $allowed_domains = null,
        public ?string $invite_id = null,
        public ?string $allow_open_invite = null,
    ) {
    }
}
