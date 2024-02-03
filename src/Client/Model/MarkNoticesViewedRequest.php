<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MarkNoticesViewedRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
