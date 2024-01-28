<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserThreads
{
    /** Total number of threads (used for paging) */
    public ?int $total;

    /** Array of threads */
    public ?array $threads;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->total = $data['total'];
        $this->threads = $data['threads'];
        return $this;
    }
}
