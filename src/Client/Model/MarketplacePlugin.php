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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return MarketplacePlugin The hydrated instance
     */
    public static function hydrate(?array $data): MarketplacePlugin
    {
        $data ??= [];

        return new self(
            homepage_url: $data['homepage_url'] ?? null,
            icon_data: $data['icon_data'] ?? null,
            download_url: $data['download_url'] ?? null,
            release_notes_url: $data['release_notes_url'] ?? null,
            labels: $data['labels'] ?? null,
            signature: $data['signature'] ?? null,
            manifest: $data['manifest'] ?? null,
            installed_version: $data['installed_version'] ?? null,
        );
    }
}
