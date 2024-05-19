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
    ): UserLimits {
        $object = new self(
            maxUsersLimit: isset($data['maxUsersLimit']) ? $data['maxUsersLimit'] : null,
            activeUserCount: isset($data['activeUserCount']) ? $data['activeUserCount'] : null,
        );
        return $object;
    }
}
