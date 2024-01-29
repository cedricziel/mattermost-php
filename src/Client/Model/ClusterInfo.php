<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ClusterInfo
{
    public function __construct(
        /** The unique ID for the node */
        public ?string $id = null,
        /** The server version the node is on */
        public ?string $version = null,
        /** The hash of the configuartion file the node is using */
        public ?string $config_hash = null,
        /** The URL used to communicate with those node from other nodes */
        public ?string $internode_url = null,
        /** The hostname for this node */
        public ?string $hostname = null,
        /** The time of the last ping to this node */
        public ?int $last_ping = null,
        /** Whether or not the node is alive and well */
        public ?bool $is_alive = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['version'] */
            if (isset($data['version'])) $this->version = $data['version'];
        /** @var string $data['config_hash'] */
            if (isset($data['config_hash'])) $this->config_hash = $data['config_hash'];
        /** @var string $data['internode_url'] */
            if (isset($data['internode_url'])) $this->internode_url = $data['internode_url'];
        /** @var string $data['hostname'] */
            if (isset($data['hostname'])) $this->hostname = $data['hostname'];
        /** @var int $data['last_ping'] */
            if (isset($data['last_ping'])) $this->last_ping = $data['last_ping'];
        /** @var bool $data['is_alive'] */
            if (isset($data['is_alive'])) $this->is_alive = $data['is_alive'];
        return $this;
    }
}
