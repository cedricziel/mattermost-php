<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RemoveChannelsFromRetentionPolicyRequest
{
    public function __construct(
        /**
         * @var string[]
         * The IDs of the channels to add to the policy.
         */
        public array $items,
    ) {
    }
}
