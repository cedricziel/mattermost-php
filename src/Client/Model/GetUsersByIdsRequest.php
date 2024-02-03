<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetUsersByIdsRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
