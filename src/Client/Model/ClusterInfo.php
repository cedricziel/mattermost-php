<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ClusterInfo
{
    /** The unique ID for the node */
    public ?string $id;

    /** The server version the node is on */
    public ?string $version;

    /** The hash of the configuartion file the node is using */
    public ?string $config_hash;

    /** The URL used to communicate with those node from other nodes */
    public ?string $internode_url;

    /** The hostname for this node */
    public ?string $hostname;

    /** The time of the last ping to this node */
    public ?int $last_ping;

    /** Whether or not the node is alive and well */
    public ?bool $is_alive;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->version = $data['version'];
        $this->config_hash = $data['config_hash'];
        $this->internode_url = $data['internode_url'];
        $this->hostname = $data['hostname'];
        $this->last_ping = $data['last_ping'];
        $this->is_alive = $data['is_alive'];
        return $this;
    }
}
