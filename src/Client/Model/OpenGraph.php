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
    ): static {
        $object = new self(
            type: isset($data['type']) ? $data['type'] : null,
            url: isset($data['url']) ? $data['url'] : null,
            title: isset($data['title']) ? $data['title'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            determiner: isset($data['determiner']) ? $data['determiner'] : null,
            site_name: isset($data['site_name']) ? $data['site_name'] : null,
            locale: isset($data['locale']) ? $data['locale'] : null,
            locales_alternate: isset($data['locales_alternate']) ? $data['locales_alternate'] : null,
            images: isset($data['images']) ? $data['images'] : null,
            videos: isset($data['videos']) ? $data['videos'] : null,
            audios: isset($data['audios']) ? $data['audios'] : null,
            article: isset($data['article']) ? (object) $data['article'] : null,
            book: isset($data['book']) ? (object) $data['book'] : null,
            profile: isset($data['profile']) ? (object) $data['profile'] : null,
        );
        return $object;
    }
}
