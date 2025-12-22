<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RemoteClusterInfo
{
    public function __construct(
        /** The display name for the remote cluster */
        public ?string $display_name = null,
        /** The time in milliseconds a remote cluster was created */
        public ?int $create_at = null,
        /** The time in milliseconds a remote cluster was last pinged successfully */
        public ?int $last_ping_at = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return RemoteClusterInfo The hydrated instance
     */
    public static function hydrate(?array $data): RemoteClusterInfo
    {
        $data ??= [];

        return new self(
            display_name: $data['display_name'] ?? null,
            create_at: $data['create_at'] ?? null,
            last_ping_at: $data['last_ping_at'] ?? null,
        );
    }
}
