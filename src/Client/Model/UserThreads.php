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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UserThreads The hydrated instance
     */
    public static function hydrate(?array $data): UserThreads
    {
        $data ??= [];

        return new self(
            total: $data['total'] ?? null,
            threads: $data['threads'] ?? null,
        );
    }
}
