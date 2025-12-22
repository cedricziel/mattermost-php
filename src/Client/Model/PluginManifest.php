<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PluginManifest
{
    public function __construct(
        /** Globally unique identifier that represents the plugin. */
        public ?string $id = null,
        /** Name of the plugin. */
        public ?string $name = null,
        /** Description of what the plugin is and does. */
        public ?string $description = null,
        /** Version number of the plugin. */
        public ?string $version = null,
        /**
         * The minimum Mattermost server version required for the plugin.
         *
         * Available as server version 5.6.
         */
        public ?string $min_server_version = null,
        /** Deprecated in Mattermost 5.2 release. */
        public ?\stdClass $backend = null,
        public ?\stdClass $server = null,
        public ?\stdClass $webapp = null,
        /** Settings schema used to define the System Console UI for the plugin. */
        public ?\stdClass $settings_schema = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PluginManifest The hydrated instance
     */
    public static function hydrate(?array $data): PluginManifest
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            description: $data['description'] ?? null,
            version: $data['version'] ?? null,
            min_server_version: $data['min_server_version'] ?? null,
            backend: isset($data['backend']) ? (object) $data['backend'] : null,
            server: isset($data['server']) ? (object) $data['server'] : null,
            webapp: isset($data['webapp']) ? (object) $data['webapp'] : null,
            settings_schema: isset($data['settings_schema']) ? (object) $data['settings_schema'] : null,
        );
    }
}
