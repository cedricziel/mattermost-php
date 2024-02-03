<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeration
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
            name: isset($data['name']) ? $data['name'] : null,
            roles: isset($data['roles']) ? $data['roles'] : null,
        );
        return $object;
    }
}
