<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ServerLimits
{
    public function __construct(
        /** The maximum number of users allowed on server */
        public ?int $maxUsersLimit = null,
        /** The number of active users in the server */
        public ?int $activeUserCount = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ServerLimits The hydrated instance
     */
    public static function hydrate(?array $data): ServerLimits
    {
        $data ??= [];

        return new self(
            maxUsersLimit: $data['maxUsersLimit'] ?? null,
            activeUserCount: $data['activeUserCount'] ?? null,
        );
    }
}
