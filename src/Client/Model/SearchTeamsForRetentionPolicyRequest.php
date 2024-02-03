<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchTeamsForRetentionPolicyRequest
{
    public function __construct(
        /** The search term to match against the name or display name of teams */
        public ?string $term = null,
    ) {
    }
}
