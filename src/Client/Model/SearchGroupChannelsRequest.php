<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchGroupChannelsRequest
{
    public function __construct(
        /** The search term to match against the members' usernames of the group channels */
        public ?string $term = null,
    ) {
    }
}
