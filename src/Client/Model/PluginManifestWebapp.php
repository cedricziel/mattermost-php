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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['version'] */
            if (isset($data['version'])) $this->version = $data['version'];
        /** @var stdClass $data['webapp'] */
            if (isset($data['webapp'])) $this->webapp = (object) $data['webapp'];
        return $this;
    }
}
