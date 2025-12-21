<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchCPAFieldRequest
{
    public function __construct(
        public ?string $name = null,
        public ?string $type = null,
        public ?\stdClass $attrs = null,
    ) {
    }
}
