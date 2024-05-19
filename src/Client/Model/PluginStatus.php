<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PluginStatus
{
    public function __construct(
        /** Globally unique identifier that represents the plugin. */
        public ?string $plugin_id = null,
        /** Name of the plugin. */
        public ?string $name = null,
        /** Description of what the plugin is and does. */
        public ?string $description = null,
        /** Version number of the plugin. */
        public ?string $version = null,
        /** ID of the cluster in which plugin is running */
        public ?string $cluster_id = null,
        /** Path to the plugin on the server */
        public ?string $plugin_path = null,
        /** State of the plugin */
        public ?int $state = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            plugin_id: isset($data['plugin_id']) ? $data['plugin_id'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            version: isset($data['version']) ? $data['version'] : null,
            cluster_id: isset($data['cluster_id']) ? $data['cluster_id'] : null,
            plugin_path: isset($data['plugin_path']) ? $data['plugin_path'] : null,
            state: isset($data['state']) ? $data['state'] : null,
        );
        return $object;
    }
}
