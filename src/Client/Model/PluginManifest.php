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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['version'] */
            if (isset($data['version'])) $this->version = $data['version'];
        /** @var string $data['min_server_version'] */
            if (isset($data['min_server_version'])) $this->min_server_version = $data['min_server_version'];
        /** @var stdClass $data['backend'] */
            if (isset($data['backend'])) $this->backend = (object) $data['backend'];
        /** @var stdClass $data['server'] */
            if (isset($data['server'])) $this->server = (object) $data['server'];
        /** @var stdClass $data['webapp'] */
            if (isset($data['webapp'])) $this->webapp = (object) $data['webapp'];
        /** @var stdClass $data['settings_schema'] */
            if (isset($data['settings_schema'])) $this->settings_schema = (object) $data['settings_schema'];
        return $this;
    }
}
