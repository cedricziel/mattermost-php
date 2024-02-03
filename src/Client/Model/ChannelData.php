<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelData
{
    public function __construct(
        public $channel = null,
        public $member = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            channel: $data['channel'] ?? null,
            member: $data['member'] ?? null,
        );
        return $object;
    }
}
