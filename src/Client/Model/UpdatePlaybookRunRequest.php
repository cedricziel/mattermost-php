<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdatePlaybookRunRequest
{
    public function __construct(
        /** The new name of the playbook run. */
        public ?string $name = null,
    ) {
    }
}
