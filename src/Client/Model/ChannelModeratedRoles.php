<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelModeratedRoles
{
    public function __construct(
        public $guests = null,
        public $members = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            guests: $data['guests'] ?? null,
            members: $data['members'] ?? null,
        );
        return $object;
    }
}
