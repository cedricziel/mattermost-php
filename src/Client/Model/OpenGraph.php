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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['type'] */
            if (isset($data['type'])) $this->type = $data['type'];
        /** @var string $data['url'] */
            if (isset($data['url'])) $this->url = $data['url'];
        /** @var string $data['title'] */
            if (isset($data['title'])) $this->title = $data['title'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['determiner'] */
            if (isset($data['determiner'])) $this->determiner = $data['determiner'];
        /** @var string $data['site_name'] */
            if (isset($data['site_name'])) $this->site_name = $data['site_name'];
        /** @var string $data['locale'] */
            if (isset($data['locale'])) $this->locale = $data['locale'];
        /** @var array $data['locales_alternate'] */
            if (isset($data['locales_alternate'])) $this->locales_alternate = $data['locales_alternate'];
        /** @var array $data['images'] */
            if (isset($data['images'])) $this->images = $data['images'];
        /** @var array $data['videos'] */
            if (isset($data['videos'])) $this->videos = $data['videos'];
        /** @var array $data['audios'] */
            if (isset($data['audios'])) $this->audios = $data['audios'];
        /** @var stdClass $data['article'] */
            if (isset($data['article'])) $this->article = (object) $data['article'];
        /** @var stdClass $data['book'] */
            if (isset($data['book'])) $this->book = (object) $data['book'];
        /** @var stdClass $data['profile'] */
            if (isset($data['profile'])) $this->profile = (object) $data['profile'];
        return $this;
    }
}
