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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            version: isset($data['version']) ? $data['version'] : null,
            config_hash: isset($data['config_hash']) ? $data['config_hash'] : null,
            internode_url: isset($data['internode_url']) ? $data['internode_url'] : null,
            hostname: isset($data['hostname']) ? $data['hostname'] : null,
            last_ping: isset($data['last_ping']) ? $data['last_ping'] : null,
            is_alive: isset($data['is_alive']) ? $data['is_alive'] : null,
        );
        return $object;
    }
}
