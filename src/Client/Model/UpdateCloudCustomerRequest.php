<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateCloudCustomerRequest
{
    public function __construct(
        public ?string $name = null,
        public ?string $email = null,
        public ?string $contact_first_name = null,
        public ?string $contact_last_name = null,
        public ?string $num_employees = null,
    ) {
    }
}
