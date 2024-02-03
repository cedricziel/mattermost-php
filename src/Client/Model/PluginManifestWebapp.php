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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            version: $data['version'] ?? null,
            webapp: (object) $data['webapp'] ?? null,
        );
        return $object;
    }
}
