<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MarketplacePlugin
{
    /** URL that leads to the homepage of the plugin. */
    public ?string $homepage_url;

    /** Base64 encoding of a plugin icon SVG. */
    public ?string $icon_data;

    /** URL to download the plugin. */
    public ?string $download_url;

    /** URL that leads to the release notes of the plugin. */
    public ?string $release_notes_url;

    /** A list of the plugin labels. */
    public ?array $labels;

    /** Base64 encoded signature of the plugin. */
    public ?string $signature;
    public $manifest;

    /** Version number of the already installed plugin, if any. */
    public ?string $installed_version;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->homepage_url = $data['homepage_url'];
        $this->icon_data = $data['icon_data'];
        $this->download_url = $data['download_url'];
        $this->release_notes_url = $data['release_notes_url'];
        $this->labels = $data['labels'];
        $this->signature = $data['signature'];
        $this->manifest = $data['manifest'];
        $this->installed_version = $data['installed_version'];
        return $this;
    }
}
