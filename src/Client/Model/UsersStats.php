<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UsersStats
{
    public function __construct(
        public ?int $total_users_count = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var int $data['total_users_count'] */
            if (isset($data['total_users_count'])) $this->total_users_count = $data['total_users_count'];
        return $this;
    }
}
