<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchChannelsRequest
{
    public function __construct(
        /** The search term to match against the name or display name of channels */
        public ?string $term = null,
    ) {
    }
}
