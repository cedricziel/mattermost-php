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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            channel_name: isset($data['channel_name']) ? $data['channel_name'] : null,
            channel_display_name: isset($data['channel_display_name']) ? $data['channel_display_name'] : null,
            team_name: isset($data['team_name']) ? $data['team_name'] : null,
            num_members: isset($data['num_members']) ? $data['num_members'] : null,
            total_posts: isset($data['total_posts']) ? $data['total_posts'] : null,
        );
        return $object;
    }
}
