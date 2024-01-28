<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelStats
{
    public ?string $channel_id;
    public ?int $member_count;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->channel_id = $data['channel_id'];
        $this->member_count = $data['member_count'];
        return $this;
    }
}
