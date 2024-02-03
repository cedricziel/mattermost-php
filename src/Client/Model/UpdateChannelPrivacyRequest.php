<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateChannelPrivacyRequest
{
    public function __construct(
        /** Channel privacy setting: 'O' for a public channel, 'P' for a private channel */
        public string $privacy,
    ) {
    }
}
