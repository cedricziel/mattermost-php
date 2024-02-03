<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchTeamRequest
{
    public function __construct(
        public ?string $display_name = null,
        public ?string $description = null,
        public ?string $company_name = null,
        public ?string $invite_id = null,
        public ?bool $allow_open_invite = null,
    ) {
    }
}
