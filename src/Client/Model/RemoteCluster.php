<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RemoteCluster
{
    public function __construct(
        public ?string $remote_id = null,
        public ?string $remote_team_id = null,
        public ?string $name = null,
        public ?string $display_name = null,
        /** URL of the remote cluster */
        public ?string $site_url = null,
        /** The team where channels from invites are created */
        public ?string $default_team_id = null,
        /** Time in milliseconds that the remote cluster was created */
        public ?int $create_at = null,
        /** Time in milliseconds that the remote cluster record was deleted */
        public ?int $delete_at = null,
        /** Time in milliseconds when the last ping to the remote cluster was run */
        public ?int $last_ping_at = null,
        public ?string $token = null,
        public ?string $remote_token = null,
        public ?string $topics = null,
        public ?string $creator_id = null,
        public ?string $plugin_id = null,
        /** A bitmask with a set of option flags */
        public ?int $options = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): RemoteCluster {
        $object = new self(
            remote_id: isset($data['remote_id']) ? $data['remote_id'] : null,
            remote_team_id: isset($data['remote_team_id']) ? $data['remote_team_id'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            site_url: isset($data['site_url']) ? $data['site_url'] : null,
            default_team_id: isset($data['default_team_id']) ? $data['default_team_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            last_ping_at: isset($data['last_ping_at']) ? $data['last_ping_at'] : null,
            token: isset($data['token']) ? $data['token'] : null,
            remote_token: isset($data['remote_token']) ? $data['remote_token'] : null,
            topics: isset($data['topics']) ? $data['topics'] : null,
            creator_id: isset($data['creator_id']) ? $data['creator_id'] : null,
            plugin_id: isset($data['plugin_id']) ? $data['plugin_id'] : null,
            options: isset($data['options']) ? $data['options'] : null,
        );
        return $object;
    }
}
