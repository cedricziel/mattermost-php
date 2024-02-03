<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelStats
{
    public function __construct(
        public ?string $channel_id = null,
        public ?int $member_count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            member_count: isset($data['member_count']) ? $data['member_count'] : null,
        );
        return $object;
    }
}
