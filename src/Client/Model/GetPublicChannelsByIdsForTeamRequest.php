<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetPublicChannelsByIdsForTeamRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
