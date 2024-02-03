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
            Id: $data['Id'] ?? null,
            Fallback: $data['Fallback'] ?? null,
            Color: $data['Color'] ?? null,
            Pretext: $data['Pretext'] ?? null,
            AuthorName: $data['AuthorName'] ?? null,
            AuthorLink: $data['AuthorLink'] ?? null,
            AuthorIcon: $data['AuthorIcon'] ?? null,
            Title: $data['Title'] ?? null,
            TitleLink: $data['TitleLink'] ?? null,
            Text: $data['Text'] ?? null,
            Fields: $data['Fields'] ?? null,
            ImageURL: $data['ImageURL'] ?? null,
            ThumbURL: $data['ThumbURL'] ?? null,
            Footer: $data['Footer'] ?? null,
            FooterIcon: $data['FooterIcon'] ?? null,
            Timestamp: $data['Timestamp'] ?? null,
        );
        return $object;
    }
}
