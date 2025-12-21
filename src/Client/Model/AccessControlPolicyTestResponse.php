<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlPolicyTestResponse
{
    public function __construct(
        /** A list of users affected by the policy expression. */
        public ?array $users = null,
        /** The total number of users affected. */
        public ?int $total_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): AccessControlPolicyTestResponse {
        $object = new self(
            users: isset($data['users']) ? $data['users'] : null,
            total_count: isset($data['total_count']) ? $data['total_count'] : null,
        );
        return $object;
    }
}
