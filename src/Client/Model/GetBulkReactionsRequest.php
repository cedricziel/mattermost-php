<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetBulkReactionsRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
