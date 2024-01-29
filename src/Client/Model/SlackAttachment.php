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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['Id'] */
            if (isset($data['Id'])) $this->Id = $data['Id'];
        /** @var string $data['Fallback'] */
            if (isset($data['Fallback'])) $this->Fallback = $data['Fallback'];
        /** @var string $data['Color'] */
            if (isset($data['Color'])) $this->Color = $data['Color'];
        /** @var string $data['Pretext'] */
            if (isset($data['Pretext'])) $this->Pretext = $data['Pretext'];
        /** @var string $data['AuthorName'] */
            if (isset($data['AuthorName'])) $this->AuthorName = $data['AuthorName'];
        /** @var string $data['AuthorLink'] */
            if (isset($data['AuthorLink'])) $this->AuthorLink = $data['AuthorLink'];
        /** @var string $data['AuthorIcon'] */
            if (isset($data['AuthorIcon'])) $this->AuthorIcon = $data['AuthorIcon'];
        /** @var string $data['Title'] */
            if (isset($data['Title'])) $this->Title = $data['Title'];
        /** @var string $data['TitleLink'] */
            if (isset($data['TitleLink'])) $this->TitleLink = $data['TitleLink'];
        /** @var string $data['Text'] */
            if (isset($data['Text'])) $this->Text = $data['Text'];
        /** @var array $data['Fields'] */
            if (isset($data['Fields'])) $this->Fields = $data['Fields'];
        /** @var string $data['ImageURL'] */
            if (isset($data['ImageURL'])) $this->ImageURL = $data['ImageURL'];
        /** @var string $data['ThumbURL'] */
            if (isset($data['ThumbURL'])) $this->ThumbURL = $data['ThumbURL'];
        /** @var string $data['Footer'] */
            if (isset($data['Footer'])) $this->Footer = $data['Footer'];
        /** @var string $data['FooterIcon'] */
            if (isset($data['FooterIcon'])) $this->FooterIcon = $data['FooterIcon'];
        /** @var string $data['Timestamp'] */
            if (isset($data['Timestamp'])) $this->Timestamp = $data['Timestamp'];
        return $this;
    }
}
