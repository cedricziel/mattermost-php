<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeratedRolesPatch
{
    public function __construct(
        public ?bool $guests = null,
        public ?bool $members = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelModeratedRolesPatch The hydrated instance
     */
    public static function hydrate(?array $data): ChannelModeratedRolesPatch
    {
        $data ??= [];

        return new self(
            guests: $data['guests'] ?? null,
            members: $data['members'] ?? null,
        );
    }
}
