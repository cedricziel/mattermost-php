<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MarketplacePlugin
{
    public function __construct(
        /** URL that leads to the homepage of the plugin. */
        public ?string $homepage_url = null,
        /** Base64 encoding of a plugin icon SVG. */
        public ?string $icon_data = null,
        /** URL to download the plugin. */
        public ?string $download_url = null,
        /** URL that leads to the release notes of the plugin. */
        public ?string $release_notes_url = null,
        /** A list of the plugin labels. */
        public ?array $labels = null,
        /** Base64 encoded signature of the plugin. */
        public ?string $signature = null,
        public $manifest = null,
        /** Version number of the already installed plugin, if any. */
        public ?string $installed_version = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['homepage_url'] */
            if (isset($data['homepage_url'])) $this->homepage_url = $data['homepage_url'];
        /** @var string $data['icon_data'] */
            if (isset($data['icon_data'])) $this->icon_data = $data['icon_data'];
        /** @var string $data['download_url'] */
            if (isset($data['download_url'])) $this->download_url = $data['download_url'];
        /** @var string $data['release_notes_url'] */
            if (isset($data['release_notes_url'])) $this->release_notes_url = $data['release_notes_url'];
        /** @var array $data['labels'] */
            if (isset($data['labels'])) $this->labels = $data['labels'];
        /** @var string $data['signature'] */
            if (isset($data['signature'])) $this->signature = $data['signature'];
        /** @var  $data['manifest'] */
            if (isset($data['manifest'])) $this->manifest = $data['manifest'];
        /** @var string $data['installed_version'] */
            if (isset($data['installed_version'])) $this->installed_version = $data['installed_version'];
        return $this;
    }
}
