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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            total: isset($data['total']) ? $data['total'] : null,
            threads: isset($data['threads']) ? $data['threads'] : null,
        );
        return $object;
    }
}
