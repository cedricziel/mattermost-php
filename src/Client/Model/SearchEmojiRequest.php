<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchEmojiRequest
{
    public function __construct(
        /** The term to match against the emoji name. */
        public ?string $term = null,
        /** Set to only search for names starting with the search term. */
        public ?string $prefix_only = null,
    ) {
    }
}
