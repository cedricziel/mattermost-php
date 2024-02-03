<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetRolesByNamesRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
