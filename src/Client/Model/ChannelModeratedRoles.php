<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeratedRoles
{
    public function __construct(
        public $guests = null,
        public $members = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelModeratedRoles The hydrated instance
     */
    public static function hydrate(?array $data): ChannelModeratedRoles
    {
        $data ??= [];

        return new self(
            guests: $data['guests'] ?? null,
            members: $data['members'] ?? null,
        );
    }
}
