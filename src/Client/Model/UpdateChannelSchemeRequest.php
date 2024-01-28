<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateChannelSchemeRequest
{
    public function __construct(
        /** The ID of the scheme. */
        public string $scheme_id,
    ) {
    }
}
