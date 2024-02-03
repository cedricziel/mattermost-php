<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SlackAttachment
{
    public function __construct(
        public ?string $Id = null,
        public ?string $Fallback = null,
        public ?string $Color = null,
        public ?string $Pretext = null,
        public ?string $AuthorName = null,
        public ?string $AuthorLink = null,
        public ?string $AuthorIcon = null,
        public ?string $Title = null,
        public ?string $TitleLink = null,
        public ?string $Text = null,
        public ?array $Fields = null,
        public ?string $ImageURL = null,
        public ?string $ThumbURL = null,
        public ?string $Footer = null,
        public ?string $FooterIcon = null,
        /** The timestamp of the slack attachment, either type of string or integer */
        public ?string $Timestamp = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            Id: isset($data['Id']) ? $data['Id'] : null,
            Fallback: isset($data['Fallback']) ? $data['Fallback'] : null,
            Color: isset($data['Color']) ? $data['Color'] : null,
            Pretext: isset($data['Pretext']) ? $data['Pretext'] : null,
            AuthorName: isset($data['AuthorName']) ? $data['AuthorName'] : null,
            AuthorLink: isset($data['AuthorLink']) ? $data['AuthorLink'] : null,
            AuthorIcon: isset($data['AuthorIcon']) ? $data['AuthorIcon'] : null,
            Title: isset($data['Title']) ? $data['Title'] : null,
            TitleLink: isset($data['TitleLink']) ? $data['TitleLink'] : null,
            Text: isset($data['Text']) ? $data['Text'] : null,
            Fields: isset($data['Fields']) ? $data['Fields'] : null,
            ImageURL: isset($data['ImageURL']) ? $data['ImageURL'] : null,
            ThumbURL: isset($data['ThumbURL']) ? $data['ThumbURL'] : null,
            Footer: isset($data['Footer']) ? $data['Footer'] : null,
            FooterIcon: isset($data['FooterIcon']) ? $data['FooterIcon'] : null,
            Timestamp: isset($data['Timestamp']) ? $data['Timestamp'] : null,
        );
        return $object;
    }
}
