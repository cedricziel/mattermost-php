<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchArchivedChannelsRequest
{
    public function __construct(
        /** The search term to match against the name or display name of archived channels */
        public ?string $term = null,
    ) {
    }
}
