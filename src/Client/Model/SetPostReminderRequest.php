<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SetPostReminderRequest
{
    public function __construct(
        /** Target time for the reminder */
        public ?int $target_time = null,
    ) {
    }
}
