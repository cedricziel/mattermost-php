<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UsersStats
{
    public ?int $total_users_count;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->total_users_count = $data['total_users_count'];
        return $this;
    }
}
