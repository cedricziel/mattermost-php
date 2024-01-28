<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyForTeam
{
    /** The team ID. */
    public ?string $team_id;

    /** The number of days a message will be retained before being deleted by this policy. */
    public ?int $post_duration;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->team_id = $data['team_id'];
        $this->post_duration = $data['post_duration'];
        return $this;
    }
}
