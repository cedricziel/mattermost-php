<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchBotRequest
{
    public function __construct(
        public ?string $username = null,
        public ?string $display_name = null,
        public ?string $description = null,
    ) {
    }
}
