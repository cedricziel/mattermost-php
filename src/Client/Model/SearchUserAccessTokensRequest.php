<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchUserAccessTokensRequest
{
    public function __construct(
        /** The search term to match against the token id, user id or username. */
        public string $term,
    ) {
    }
}
