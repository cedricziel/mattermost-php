<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelData
{
    public $channel;
    public $member;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->channel = $data['channel'];
        $this->member = $data['member'];
        return $this;
    }
}
