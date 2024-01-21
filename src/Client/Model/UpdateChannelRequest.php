<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateChannelRequest
{
    public function __construct(
        /** The channel's id, not updatable */
        public ?string $id = null,
        /** The unique handle for the channel, will be present in the channel URL */
        public ?string $name = null,
        /** The non-unique UI name for the channel */
        public ?string $display_name = null,
        /** A short description of the purpose of the channel */
        public ?string $purpose = null,
        /** Markdown-formatted text to display in the header of the channel */
        public ?string $header = null,
    ) {
    }
}
