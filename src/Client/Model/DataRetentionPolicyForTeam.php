<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyForTeam
{
    public function __construct(
        /** The team ID. */
        public ?string $team_id = null,
        /** The number of days a message will be retained before being deleted by this policy. */
        public ?int $post_duration = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['team_id'] */
            if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var int $data['post_duration'] */
            if (isset($data['post_duration'])) $this->post_duration = $data['post_duration'];
        return $this;
    }
}
