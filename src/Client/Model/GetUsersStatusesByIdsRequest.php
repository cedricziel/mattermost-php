<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetUsersStatusesByIdsRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
