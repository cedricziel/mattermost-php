<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModerationPatch
{
    public function __construct(
        public ?string $name = null,
        public $roles = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            name: $data['name'] ?? null,
            roles: $data['roles'] ?? null,
        );
        return $object;
    }
}
