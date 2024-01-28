<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PushNotification
{
    public ?string $ack_id;
    public ?string $platform;
    public ?string $server_id;
    public ?string $device_id;
    public ?string $post_id;
    public ?string $category;
    public ?string $sound;
    public ?string $message;
    public ?\number $badge;
    public ?\number $cont_ava;
    public ?string $team_id;
    public ?string $channel_id;
    public ?string $root_id;
    public ?string $channel_name;
    public ?string $type;
    public ?string $sender_id;
    public ?string $sender_name;
    public ?string $override_username;
    public ?string $override_icon_url;
    public ?string $from_webhook;
    public ?string $version;
    public ?bool $is_id_loaded;

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
