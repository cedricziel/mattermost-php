<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserThreads
{
    /** Total number of threads (used for paging) */
    public ?int $total;

    /** Array of threads */
    public ?array $threads;
}
;