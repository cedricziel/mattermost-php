<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateCPAFieldRequest
{
    public function __construct(
        public string $name,
        public string $type,
        public ?\stdClass $attrs = null,
    ) {
    }
}
