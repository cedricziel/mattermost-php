<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PushNotification
{
    public function __construct(
        public ?string $ack_id = null,
        public ?string $platform = null,
        public ?string $server_id = null,
        public ?string $device_id = null,
        public ?string $post_id = null,
        public ?string $category = null,
        public ?string $sound = null,
        public ?string $message = null,
        public ?\number $badge = null,
        public ?\number $cont_ava = null,
        public ?string $team_id = null,
        public ?string $channel_id = null,
        public ?string $root_id = null,
        public ?string $channel_name = null,
        public ?string $type = null,
        public ?string $sender_id = null,
        public ?string $sender_name = null,
        public ?string $override_username = null,
        public ?string $override_icon_url = null,
        public ?string $from_webhook = null,
        public ?string $version = null,
        public ?bool $is_id_loaded = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['ack_id'] */
            if (isset($data['ack_id'])) $this->ack_id = $data['ack_id'];
        /** @var string $data['platform'] */
            if (isset($data['platform'])) $this->platform = $data['platform'];
        /** @var string $data['server_id'] */
            if (isset($data['server_id'])) $this->server_id = $data['server_id'];
        /** @var string $data['device_id'] */
            if (isset($data['device_id'])) $this->device_id = $data['device_id'];
        /** @var string $data['post_id'] */
            if (isset($data['post_id'])) $this->post_id = $data['post_id'];
        /** @var string $data['category'] */
            if (isset($data['category'])) $this->category = $data['category'];
        /** @var string $data['sound'] */
            if (isset($data['sound'])) $this->sound = $data['sound'];
        /** @var string $data['message'] */
            if (isset($data['message'])) $this->message = $data['message'];
        /** @var number $data['badge'] */
            if (isset($data['badge'])) $this->badge = $data['badge'];
        /** @var number $data['cont_ava'] */
            if (isset($data['cont_ava'])) $this->cont_ava = $data['cont_ava'];
        /** @var string $data['team_id'] */
            if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var string $data['channel_id'] */
            if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var string $data['root_id'] */
            if (isset($data['root_id'])) $this->root_id = $data['root_id'];
        /** @var string $data['channel_name'] */
            if (isset($data['channel_name'])) $this->channel_name = $data['channel_name'];
        /** @var string $data['type'] */
            if (isset($data['type'])) $this->type = $data['type'];
        /** @var string $data['sender_id'] */
            if (isset($data['sender_id'])) $this->sender_id = $data['sender_id'];
        /** @var string $data['sender_name'] */
            if (isset($data['sender_name'])) $this->sender_name = $data['sender_name'];
        /** @var string $data['override_username'] */
            if (isset($data['override_username'])) $this->override_username = $data['override_username'];
        /** @var string $data['override_icon_url'] */
            if (isset($data['override_icon_url'])) $this->override_icon_url = $data['override_icon_url'];
        /** @var string $data['from_webhook'] */
            if (isset($data['from_webhook'])) $this->from_webhook = $data['from_webhook'];
        /** @var string $data['version'] */
            if (isset($data['version'])) $this->version = $data['version'];
        /** @var bool $data['is_id_loaded'] */
            if (isset($data['is_id_loaded'])) $this->is_id_loaded = $data['is_id_loaded'];
        return $this;
    }
}
