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
        array $data,
    ): static
    {
        $this->ack_id = $data['ack_id'];
        $this->platform = $data['platform'];
        $this->server_id = $data['server_id'];
        $this->device_id = $data['device_id'];
        $this->post_id = $data['post_id'];
        $this->category = $data['category'];
        $this->sound = $data['sound'];
        $this->message = $data['message'];
        $this->badge = $data['badge'];
        $this->cont_ava = $data['cont_ava'];
        $this->team_id = $data['team_id'];
        $this->channel_id = $data['channel_id'];
        $this->root_id = $data['root_id'];
        $this->channel_name = $data['channel_name'];
        $this->type = $data['type'];
        $this->sender_id = $data['sender_id'];
        $this->sender_name = $data['sender_name'];
        $this->override_username = $data['override_username'];
        $this->override_icon_url = $data['override_icon_url'];
        $this->from_webhook = $data['from_webhook'];
        $this->version = $data['version'];
        $this->is_id_loaded = $data['is_id_loaded'];
        return $this;
    }
}
