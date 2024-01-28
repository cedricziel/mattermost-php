<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamStats
{
    public ?string $team_id;
    public ?int $total_member_count;
    public ?int $active_member_count;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->team_id = $data['team_id'];
        $this->total_member_count = $data['total_member_count'];
        $this->active_member_count = $data['active_member_count'];
        return $this;
    }
}
