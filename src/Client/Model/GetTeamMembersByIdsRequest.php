<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GetTeamMembersByIdsRequest
{
    public function __construct(
        /**
         * @var string[]
         */
        public array $items,
    ) {
    }
}
