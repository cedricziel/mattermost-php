<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserThreads
{
    public function __construct(
        /** Total number of threads (used for paging) */
        public ?int $total = null,
        /** Array of threads */
        public ?array $threads = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['total'] */
            if (isset($data['total'])) $this->total = $data['total'];
        /** @var array $data['threads'] */
            if (isset($data['threads'])) $this->threads = $data['threads'];
        return $this;
    }
}
