<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchGroupRequest
{
    public function __construct(
        public ?string $name = null,
        public ?string $display_name = null,
        public ?string $description = null,
    ) {
    }
}
