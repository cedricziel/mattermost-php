<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AssignAccessControlPolicyToChannelsRequest
{
    public function __construct(
        /** The IDs of the channels to assign the policy to. */
        public ?array $channel_ids = null,
    ) {
    }
}
