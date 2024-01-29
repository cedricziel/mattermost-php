<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelMember
{
    public function __construct(
        public ?string $channel_id = null,
        public ?string $user_id = null,
        public ?string $roles = null,
        /** The time in milliseconds the channel was last viewed by the user */
        public ?int $last_viewed_at = null,
        public ?int $msg_count = null,
        public ?int $mention_count = null,
        public $notify_props = null,
        /** The time in milliseconds the channel member was last updated */
        public ?int $last_update_at = null,
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
        /** @var string $data['user_id'] */
            if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['roles'] */
            if (isset($data['roles'])) $this->roles = $data['roles'];
        /** @var int $data['last_viewed_at'] */
            if (isset($data['last_viewed_at'])) $this->last_viewed_at = $data['last_viewed_at'];
        /** @var int $data['msg_count'] */
            if (isset($data['msg_count'])) $this->msg_count = $data['msg_count'];
        /** @var int $data['mention_count'] */
            if (isset($data['mention_count'])) $this->mention_count = $data['mention_count'];
        /** @var  $data['notify_props'] */
            if (isset($data['notify_props'])) $this->notify_props = $data['notify_props'];
        /** @var int $data['last_update_at'] */
            if (isset($data['last_update_at'])) $this->last_update_at = $data['last_update_at'];
        return $this;
    }
}
