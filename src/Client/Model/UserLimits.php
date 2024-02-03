<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserLimits
{
    public function __construct(
        /** The maximum number of users allowed on server */
        public ?int $maxUsersLimit = null,
        /** The number of active users in the server */
        public ?int $activeUserCount = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            maxUsersLimit: $data['maxUsersLimit'] ?? null,
            activeUserCount: $data['activeUserCount'] ?? null,
        );
        return $object;
    }
}
