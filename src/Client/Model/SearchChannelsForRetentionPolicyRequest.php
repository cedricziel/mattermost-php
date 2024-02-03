<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchChannelsForRetentionPolicyRequest
{
    public function __construct(
        /** The string to search in the channel name, display name, and purpose. */
        public ?string $term = null,
        /**
         * Filters results to channels belonging to the given team ids
         */
        public ?array $team_ids = null,
        /**
         * Filters results to only return Public / Open channels, can be used in conjunction with `private` to return both `public` and `private` channels
         */
        public ?bool $public = null,
        /**
         * Filters results to only return Private channels, can be used in conjunction with `public` to return both `private` and `public` channels
         */
        public ?bool $private = null,
        /**
         * Filters results to only return deleted / archived channels
         */
        public ?bool $deleted = null,
    ) {
    }
}
