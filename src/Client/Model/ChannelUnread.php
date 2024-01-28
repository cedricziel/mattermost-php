<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelUnread
{
    public ?string $team_id;
    public ?string $channel_id;
    public ?int $msg_count;
    public ?int $mention_count;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->team_id = $data['team_id'];
        $this->channel_id = $data['channel_id'];
        $this->msg_count = $data['msg_count'];
        $this->mention_count = $data['mention_count'];
        return $this;
    }
}
