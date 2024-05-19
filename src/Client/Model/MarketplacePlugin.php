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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): MarketplacePlugin {
        $object = new self(
            homepage_url: isset($data['homepage_url']) ? $data['homepage_url'] : null,
            icon_data: isset($data['icon_data']) ? $data['icon_data'] : null,
            download_url: isset($data['download_url']) ? $data['download_url'] : null,
            release_notes_url: isset($data['release_notes_url']) ? $data['release_notes_url'] : null,
            labels: isset($data['labels']) ? $data['labels'] : null,
            signature: isset($data['signature']) ? $data['signature'] : null,
            manifest: isset($data['manifest']) ? $data['manifest'] : null,
            installed_version: isset($data['installed_version']) ? $data['installed_version'] : null,
        );
        return $object;
    }
}
