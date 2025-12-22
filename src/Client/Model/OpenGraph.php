<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * OpenGraph metadata of a webpage
 */
class OpenGraph
{
    public function __construct(
        public ?string $type = null,
        public ?string $url = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $determiner = null,
        public ?string $site_name = null,
        public ?string $locale = null,
        public ?array $locales_alternate = null,
        public ?array $images = null,
        public ?array $videos = null,
        public ?array $audios = null,
        /** Article object used in OpenGraph metadata of a webpage, if type is article */
        public ?\stdClass $article = null,
        /** Book object used in OpenGraph metadata of a webpage, if type is book */
        public ?\stdClass $book = null,
        public ?\stdClass $profile = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return OpenGraph The hydrated instance
     */
    public static function hydrate(?array $data): OpenGraph
    {
        $data ??= [];

        return new self(
            type: $data['type'] ?? null,
            url: $data['url'] ?? null,
            title: $data['title'] ?? null,
            description: $data['description'] ?? null,
            determiner: $data['determiner'] ?? null,
            site_name: $data['site_name'] ?? null,
            locale: $data['locale'] ?? null,
            locales_alternate: $data['locales_alternate'] ?? null,
            images: $data['images'] ?? null,
            videos: $data['videos'] ?? null,
            audios: $data['audios'] ?? null,
            article: isset($data['article']) ? (object) $data['article'] : null,
            book: isset($data['book']) ? (object) $data['book'] : null,
            profile: isset($data['profile']) ? (object) $data['profile'] : null,
        );
    }
}
