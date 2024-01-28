<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetChannelMembersByIdsRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
