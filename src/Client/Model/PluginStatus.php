<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PluginStatus
{
    /** Globally unique identifier that represents the plugin. */
    public ?string $plugin_id;

    /** Name of the plugin. */
    public ?string $name;

    /** Description of what the plugin is and does. */
    public ?string $description;

    /** Version number of the plugin. */
    public ?string $version;

    /** ID of the cluster in which plugin is running */
    public ?string $cluster_id;

    /** Path to the plugin on the server */
    public ?string $plugin_path;

    /** State of the plugin */
    public ?\number $state;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['plugin_id'] */
        if (isset($data['plugin_id'])) $this->plugin_id = $data['plugin_id'];
        /** @var string $data['name'] */
        if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['description'] */
        if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['version'] */
        if (isset($data['version'])) $this->version = $data['version'];
        /** @var string $data['cluster_id'] */
        if (isset($data['cluster_id'])) $this->cluster_id = $data['cluster_id'];
        /** @var string $data['plugin_path'] */
        if (isset($data['plugin_path'])) $this->plugin_path = $data['plugin_path'];
        /** @var number $data['state'] */
        if (isset($data['state'])) $this->state = $data['state'];
        return $this;
    }
}
