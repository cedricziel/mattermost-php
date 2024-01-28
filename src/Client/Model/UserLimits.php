<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserLimits
{
    /** The maximum number of users allowed on server */
    public ?int $maxUsersLimit;

    /** The number of active users in the server */
    public ?int $activeUserCount;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->maxUsersLimit = $data['maxUsersLimit'];
        $this->activeUserCount = $data['activeUserCount'];
        return $this;
    }
}
