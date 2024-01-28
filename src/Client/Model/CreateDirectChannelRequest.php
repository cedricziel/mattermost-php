<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateDirectChannelRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
