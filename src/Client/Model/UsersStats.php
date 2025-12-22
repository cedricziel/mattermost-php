<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UsersStats
{
    public function __construct(
        public ?int $total_users_count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return UsersStats The hydrated instance
     */
    public static function hydrate(?array $data): UsersStats
    {
        $data ??= [];

        return new self(
            total_users_count: $data['total_users_count'] ?? null,
        );
    }
}
