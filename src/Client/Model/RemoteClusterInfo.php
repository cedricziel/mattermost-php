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
}
