<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RetentionPolicyForTeamList
{
    /** The list of team policies. */
    public ?array $policies;

    /** The total number of team policies. */
    public ?int $total_count;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->policies = $data['policies'];
        $this->total_count = $data['total_count'];
        return $this;
    }
}
