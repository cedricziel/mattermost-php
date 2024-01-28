<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddTeamsToRetentionPolicyRequest
{
    public function __construct(
        /**
         * @var string[]
         * The IDs of the teams to add to the policy.
         */
        public array $items,
    ) {
    }
}
