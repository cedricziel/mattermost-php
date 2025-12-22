<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookRunMetadata
{
    public function __construct(
        /** Name of the channel associated to the playbook run. */
        public ?string $channel_name = null,
        /** Display name of the channel associated to the playbook run. */
        public ?string $channel_display_name = null,
        /** Name of the team the playbook run is in. */
        public ?string $team_name = null,
        /** Number of users that have been members of the playbook run at any point. */
        public ?int $num_members = null,
        /** Number of posts in the channel associated to the playbook run. */
        public ?int $total_posts = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PlaybookRunMetadata The hydrated instance
     */
    public static function hydrate(?array $data): PlaybookRunMetadata
    {
        $data ??= [];

        return new self(
            channel_name: $data['channel_name'] ?? null,
            channel_display_name: $data['channel_display_name'] ?? null,
            team_name: $data['team_name'] ?? null,
            num_members: $data['num_members'] ?? null,
            total_posts: $data['total_posts'] ?? null,
        );
    }
}
