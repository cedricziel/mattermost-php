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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            display_name: $data['display_name'] ?? null,
            create_at: $data['create_at'] ?? null,
            last_ping_at: $data['last_ping_at'] ?? null,
        );
        return $object;
    }
}
