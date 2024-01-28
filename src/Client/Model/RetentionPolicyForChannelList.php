<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RetentionPolicyForChannelList
{
    /** The list of channel policies. */
    public ?array $policies;

    /** The total number of channel policies. */
    public ?int $total_count;

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
