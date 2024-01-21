<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PluginManifestWebapp
{
    /** Globally unique identifier that represents the plugin. */
    public ?string $id;

    /** Version number of the plugin. */
    public ?string $version;
    public ?\stdClass $webapp;
}
