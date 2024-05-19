<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateChannelRequest
{
    public function __construct(
        /** The team ID of the team to create the channel on */
        public string $team_id,
        /** The unique handle for the channel, will be present in the channel URL */
        public string $name,
        /** The non-unique UI name for the channel */
        public string $display_name,
        /** 'O' for a public channel, 'P' for a private channel */
        public string $type,
        /** A short description of the purpose of the channel */
        public ?string $purpose = null,
        /** Markdown-formatted text to display in the header of the channel */
        public ?string $header = null,
    ) {
    }
}
