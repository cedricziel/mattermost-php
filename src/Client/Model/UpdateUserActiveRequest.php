<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateUserActiveRequest
{
    public function __construct(
        public bool $active,
    ) {
    }
}
