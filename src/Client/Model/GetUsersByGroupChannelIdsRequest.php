<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetUsersByGroupChannelIdsRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
