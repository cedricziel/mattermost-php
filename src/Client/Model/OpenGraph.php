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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
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
            article: (object) $data['article'] ?? null,
            book: (object) $data['book'] ?? null,
            profile: (object) $data['profile'] ?? null,
        );
        return $object;
    }
}
