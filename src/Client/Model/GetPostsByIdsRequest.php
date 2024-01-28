<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetPostsByIdsRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
