<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchUserRequest
{
    public function __construct(
        public ?string $email = null,
        public ?string $username = null,
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?string $nickname = null,
        public ?string $locale = null,
        public ?string $position = null,
        public ?\stdClass $props = null,
        public $notify_props = null,
    ) {
    }
}
