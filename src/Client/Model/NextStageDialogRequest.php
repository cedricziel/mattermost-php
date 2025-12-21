<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class NextStageDialogRequest
{
    public function __construct(
        /** String representation of the zero-based index of the stage to go to. */
        public ?string $state = null,
    ) {
    }
}
