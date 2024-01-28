<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RemoteClusterInfo
{
    /** The display name for the remote cluster */
    public ?string $display_name;

    /** The time in milliseconds a remote cluster was created */
    public ?int $create_at;

    /** The time in milliseconds a remote cluster was last pinged successfully */
    public ?int $last_ping_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['display_name'] */
        if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['last_ping_at'] */
        if (isset($data['last_ping_at'])) $this->last_ping_at = $data['last_ping_at'];
        return $this;
    }
}
