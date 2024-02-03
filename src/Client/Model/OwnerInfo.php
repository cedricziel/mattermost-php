<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OwnerInfo
{
    public function __construct(
        /** A unique, 26 characters long, alphanumeric identifier for the owner. */
        public ?string $user_id = null,
        /** Owner's username. */
        public ?string $username = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            username: isset($data['username']) ? $data['username'] : null,
        );
        return $object;
    }
}
