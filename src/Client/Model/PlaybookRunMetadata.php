<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PlaybookRunMetadata
{
    /** Name of the channel associated to the playbook run. */
    public ?string $channel_name;

    /** Display name of the channel associated to the playbook run. */
    public ?string $channel_display_name;

    /** Name of the team the playbook run is in. */
    public ?string $team_name;

    /** Number of users that have been members of the playbook run at any point. */
    public ?int $num_members;

    /** Number of posts in the channel associated to the playbook run. */
    public ?int $total_posts;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['channel_name'] */
        if (isset($data['channel_name'])) $this->channel_name = $data['channel_name'];
        /** @var string $data['channel_display_name'] */
        if (isset($data['channel_display_name'])) $this->channel_display_name = $data['channel_display_name'];
        /** @var string $data['team_name'] */
        if (isset($data['team_name'])) $this->team_name = $data['team_name'];
        /** @var int $data['num_members'] */
        if (isset($data['num_members'])) $this->num_members = $data['num_members'];
        /** @var int $data['total_posts'] */
        if (isset($data['total_posts'])) $this->total_posts = $data['total_posts'];
        return $this;
    }
}
