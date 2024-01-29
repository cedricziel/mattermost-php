<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RetentionPolicyForTeamList
{
    public function __construct(
        /** The list of team policies. */
        public ?array $policies = null,
        /** The total number of team policies. */
        public ?int $total_count = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var array $data['policies'] */
            if (isset($data['policies'])) $this->policies = $data['policies'];
        /** @var int $data['total_count'] */
            if (isset($data['total_count'])) $this->total_count = $data['total_count'];
        return $this;
    }
}
