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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return RemoteCluster The hydrated instance
     */
    public static function hydrate(?array $data): RemoteCluster
    {
        $data ??= [];

        return new self(
            remote_id: $data['remote_id'] ?? null,
            remote_team_id: $data['remote_team_id'] ?? null,
            name: $data['name'] ?? null,
            display_name: $data['display_name'] ?? null,
            site_url: $data['site_url'] ?? null,
            default_team_id: $data['default_team_id'] ?? null,
            create_at: $data['create_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            last_ping_at: $data['last_ping_at'] ?? null,
            token: $data['token'] ?? null,
            remote_token: $data['remote_token'] ?? null,
            topics: $data['topics'] ?? null,
            creator_id: $data['creator_id'] ?? null,
            plugin_id: $data['plugin_id'] ?? null,
            options: $data['options'] ?? null,
        );
    }
}
