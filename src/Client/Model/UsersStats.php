<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UsersStats
{
    public function __construct(
        public ?int $total_users_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            total_users_count: $data['total_users_count'] ?? null,
        );
        return $object;
    }
}
