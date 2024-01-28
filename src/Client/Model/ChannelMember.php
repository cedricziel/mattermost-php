<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelMember
{
    public ?string $channel_id;
    public ?string $user_id;
    public ?string $roles;

    /** The time in milliseconds the channel was last viewed by the user */
    public ?int $last_viewed_at;
    public ?int $msg_count;
    public ?int $mention_count;
    public $notify_props;

    /** The time in milliseconds the channel member was last updated */
    public ?int $last_update_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->channel_id = $data['channel_id'];
        $this->user_id = $data['user_id'];
        $this->roles = $data['roles'];
        $this->last_viewed_at = $data['last_viewed_at'];
        $this->msg_count = $data['msg_count'];
        $this->mention_count = $data['mention_count'];
        $this->notify_props = $data['notify_props'];
        $this->last_update_at = $data['last_update_at'];
        return $this;
    }
}
