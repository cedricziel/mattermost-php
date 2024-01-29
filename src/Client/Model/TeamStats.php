<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamStats
{
    public function __construct(
        public ?string $team_id = null,
        public ?int $total_member_count = null,
        public ?int $active_member_count = null,
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
        /** @var int $data['total_member_count'] */
            if (isset($data['total_member_count'])) $this->total_member_count = $data['total_member_count'];
        /** @var int $data['active_member_count'] */
            if (isset($data['active_member_count'])) $this->active_member_count = $data['active_member_count'];
        return $this;
    }
}
