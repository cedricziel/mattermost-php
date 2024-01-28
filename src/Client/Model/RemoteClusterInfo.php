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
        array $data,
    ): static
    {
        $this->display_name = $data['display_name'];
        $this->create_at = $data['create_at'];
        $this->last_ping_at = $data['last_ping_at'];
        return $this;
    }
}
