<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchBotRequest
{
    public function __construct(
        public string $username,
        public ?string $display_name = null,
        public ?string $description = null,
    ) {
    }
}
