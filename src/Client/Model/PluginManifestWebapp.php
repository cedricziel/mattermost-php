<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PluginManifestWebapp
{
    /** Globally unique identifier that represents the plugin. */
    public ?string $id;

    /** Version number of the plugin. */
    public ?string $version;
    public ?\stdClass $webapp;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->version = $data['version'];
        $this->webapp = $data['webapp'];
        return $this;
    }
}
