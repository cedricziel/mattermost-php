<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * OpenGraph metadata of a webpage
 */
class OpenGraph
{
    public ?string $type;
    public ?string $url;
    public ?string $title;
    public ?string $description;
    public ?string $determiner;
    public ?string $site_name;
    public ?string $locale;
    public ?array $locales_alternate;
    public ?array $images;
    public ?array $videos;
    public ?array $audios;

    /** Article object used in OpenGraph metadata of a webpage, if type is article */
    public ?\stdClass $article;

    /** Book object used in OpenGraph metadata of a webpage, if type is book */
    public ?\stdClass $book;
    public ?\stdClass $profile;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->type = $data['type'];
        $this->url = $data['url'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->determiner = $data['determiner'];
        $this->site_name = $data['site_name'];
        $this->locale = $data['locale'];
        $this->locales_alternate = $data['locales_alternate'];
        $this->images = $data['images'];
        $this->videos = $data['videos'];
        $this->audios = $data['audios'];
        $this->article = $data['article'];
        $this->book = $data['book'];
        $this->profile = $data['profile'];
        return $this;
    }
}
