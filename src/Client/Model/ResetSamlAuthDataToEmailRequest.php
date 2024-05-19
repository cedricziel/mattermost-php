<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ResetSamlAuthDataToEmailRequest
{
    public function __construct(
        /** Whether to include deleted users. */
        public ?bool $include_deleted = false,
        /** If set to true, the number of users who would be affected is returned. */
        public ?bool $dry_run = false,
        /** If set to a non-empty array, then users whose IDs are not in the array will be excluded. */
        public ?array $user_ids = [],
    ) {
    }
}
