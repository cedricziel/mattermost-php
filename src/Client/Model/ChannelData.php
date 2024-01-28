<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelData
{
    public $channel;
    public $member;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var  $data['channel'] */
        if (isset($data['channel'])) $this->channel = $data['channel'];
        /** @var  $data['member'] */
        if (isset($data['member'])) $this->member = $data['member'];
        return $this;
    }
}
