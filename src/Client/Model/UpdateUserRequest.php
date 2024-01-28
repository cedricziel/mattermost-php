<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateUserRequest
{
    public function __construct(
        public string $id,
        public string $email,
        public string $username,
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?string $nickname = null,
        public ?string $locale = null,
        public ?string $position = null,
        public $timezone = null,
        public ?\stdClass $props = null,
        public $notify_props = null,
    ) {
    }
}
