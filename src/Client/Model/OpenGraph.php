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
}
