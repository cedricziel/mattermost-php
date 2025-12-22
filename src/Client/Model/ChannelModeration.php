<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeration
{
    public function __construct(
        public ?string $name = null,
        public $roles = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelModeration The hydrated instance
     */
    public static function hydrate(?array $data): ChannelModeration
    {
        $data ??= [];

        return new self(
            name: $data['name'] ?? null,
            roles: $data['roles'] ?? null,
        );
    }
}
