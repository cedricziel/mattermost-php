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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PluginStatus The hydrated instance
     */
    public static function hydrate(?array $data): PluginStatus
    {
        $data ??= [];

        return new self(
            plugin_id: $data['plugin_id'] ?? null,
            name: $data['name'] ?? null,
            description: $data['description'] ?? null,
            version: $data['version'] ?? null,
            cluster_id: $data['cluster_id'] ?? null,
            plugin_path: $data['plugin_path'] ?? null,
            state: $data['state'] ?? null,
        );
    }
}
