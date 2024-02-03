<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchAllChannelsRequest
{
    public function __construct(
        /** The string to search in the channel name, display name, and purpose. */
        public string $term,
        /** A group id to exclude channels that are associated to that group via GroupChannel records. */
        public ?string $not_associated_to_group = null,
        /** Exclude default channels from the results by setting this parameter to true. */
        public ?bool $exclude_default_channels = null,
        /**
         * Filters results to channels belonging to the given team ids
         *
         * __Minimum server version__: 5.26
         */
        public ?array $team_ids = null,
        /**
         * Filters results to only return channels constrained to a group
         *
         * __Minimum server version__: 5.26
         */
        public ?bool $group_constrained = null,
        /**
         * Filters results to exclude channels constrained to a group
         *
         * __Minimum server version__: 5.26
         */
        public ?bool $exclude_group_constrained = null,
        /**
         * Filters results to only return Public / Open channels, can be used in conjunction with `private` to return both `public` and `private` channels
         *
         * __Minimum server version__: 5.26
         */
        public ?bool $public = null,
        /**
         * Filters results to only return Private channels, can be used in conjunction with `public` to return both `private` and `public` channels
         *
         * __Minimum server version__: 5.26
         */
        public ?bool $private = null,
        /**
         * Filters results to only return deleted / archived channels
         *
         * __Minimum server version__: 5.26
         */
        public ?bool $deleted = null,
        /** The page number to return, if paginated. If this parameter is not present with the `per_page` parameter then the results will be returned un-paged. */
        public ?string $page = null,
        /** The number of entries to return per page, if paginated. If this parameter is not present with the `page` parameter then the results will be returned un-paged. */
        public ?string $per_page = null,
        /**
         * If set to true, only channels which do not have a granular retention policy assigned to them will be returned. The `sysconsole_read_compliance_data_retention` permission is required to use this parameter.
         * __Minimum server version__: 5.35
         */
        public ?bool $exclude_policy_constrained = null,
        /**
         * If set to true, returns channels where given search 'term' matches channel ID.
         * __Minimum server version__: 5.35
         */
        public ?bool $include_search_by_id = null,
    ) {
    }
}
