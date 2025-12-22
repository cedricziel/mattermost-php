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
        public ?int $badge = null,
        public ?int $cont_ava = null,
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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PushNotification The hydrated instance
     */
    public static function hydrate(?array $data): PushNotification
    {
        $data ??= [];

        return new self(
            ack_id: $data['ack_id'] ?? null,
            platform: $data['platform'] ?? null,
            server_id: $data['server_id'] ?? null,
            device_id: $data['device_id'] ?? null,
            post_id: $data['post_id'] ?? null,
            category: $data['category'] ?? null,
            sound: $data['sound'] ?? null,
            message: $data['message'] ?? null,
            badge: $data['badge'] ?? null,
            cont_ava: $data['cont_ava'] ?? null,
            team_id: $data['team_id'] ?? null,
            channel_id: $data['channel_id'] ?? null,
            root_id: $data['root_id'] ?? null,
            channel_name: $data['channel_name'] ?? null,
            type: $data['type'] ?? null,
            sender_id: $data['sender_id'] ?? null,
            sender_name: $data['sender_name'] ?? null,
            override_username: $data['override_username'] ?? null,
            override_icon_url: $data['override_icon_url'] ?? null,
            from_webhook: $data['from_webhook'] ?? null,
            version: $data['version'] ?? null,
            is_id_loaded: $data['is_id_loaded'] ?? null,
        );
    }
}
