<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SearchUsersRequest
{
    public function __construct(
        /** The term to match against username, full name, nickname and email */
        public string $term,
        /** If provided, only search users on this team */
        public ?string $team_id = null,
        /** If provided, only search users not on this team */
        public ?string $not_in_team_id = null,
        /** If provided, only search users in this channel */
        public ?string $in_channel_id = null,
        /** If provided, only search users not in this channel. Must specifiy `team_id` when using this option */
        public ?string $not_in_channel_id = null,
        /** If provided, only search users in this group. Must have `manage_system` permission. */
        public ?string $in_group_id = null,
        /** When used with `not_in_channel_id` or `not_in_team_id`, returns only the users that are allowed to join the channel or team based on its group constrains. */
        public ?bool $group_constrained = null,
        /** When `true`, include deactivated users in the results */
        public ?bool $allow_inactive = null,
        /** Set this to `true` if you would like to search for users that are not on a team. This option takes precendence over `team_id`, `in_channel_id`, and `not_in_channel_id`. */
        public ?bool $without_team = null,
        /**
         * The maximum number of users to return in the results
         *
         * __Available as of server version 5.6. Defaults to `100` if not provided or on an earlier server version.__
         */
        public ?int $limit = 100,
    ) {
    }
}
