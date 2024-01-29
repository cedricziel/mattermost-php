<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelStats
{
    public function __construct(
        public ?string $channel_id = null,
        public ?int $member_count = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['channel_id'] */
            if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var int $data['member_count'] */
            if (isset($data['member_count'])) $this->member_count = $data['member_count'];
        return $this;
    }
}
