<?php

namespace CedricZiel\MattermostPhp\Client;

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
}
;