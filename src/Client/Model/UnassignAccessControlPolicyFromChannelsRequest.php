<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UnassignAccessControlPolicyFromChannelsRequest
{
    public function __construct(
        /** The IDs of the channels to unassign the policy from. */
        public ?array $channel_ids = null,
    ) {
    }
}
