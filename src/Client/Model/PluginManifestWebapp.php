<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PluginManifestWebapp
{
    public function __construct(
        /** Globally unique identifier that represents the plugin. */
        public ?string $id = null,
        /** Version number of the plugin. */
        public ?string $version = null,
        public ?\stdClass $webapp = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PluginManifestWebapp The hydrated instance
     */
    public static function hydrate(?array $data): PluginManifestWebapp
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            version: $data['version'] ?? null,
            webapp: isset($data['webapp']) ? (object) $data['webapp'] : null,
        );
    }
}
