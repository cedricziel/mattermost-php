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
}
