<?php

namespace CedricZiel\MattermostPhp\Client;

class PluginManifest
{
    /** Globally unique identifier that represents the plugin. */
    public ?string $id;

    /** Name of the plugin. */
    public ?string $name;

    /** Description of what the plugin is and does. */
    public ?string $description;

    /** Version number of the plugin. */
    public ?string $version;

    /**
     * The minimum Mattermost server version required for the plugin.
     *
     * Available as server version 5.6.
     */
    public ?string $min_server_version;

    /** Deprecated in Mattermost 5.2 release. */
    public ?\stdClass $backend;
    public ?\stdClass $server;
    public ?\stdClass $webapp;

    /** Settings schema used to define the System Console UI for the plugin. */
    public ?\stdClass $settings_schema;
}
;