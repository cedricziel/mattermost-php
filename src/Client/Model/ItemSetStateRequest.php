<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ItemSetStateRequest
{
    public function __construct(
        /** The new state of the item. */
        public string $new_state = '',
    ) {
    }
}
