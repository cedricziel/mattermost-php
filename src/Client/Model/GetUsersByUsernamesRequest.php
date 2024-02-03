<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetUsersByUsernamesRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
