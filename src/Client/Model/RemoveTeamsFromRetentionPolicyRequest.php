<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RemoveTeamsFromRetentionPolicyRequest
{
    public function __construct(
        /**
         * @var string[]
         * The IDs of the teams to remove from the policy.
         */
        public array $items,
    ) {
    }
}
