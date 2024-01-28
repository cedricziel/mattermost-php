<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SlackAttachment
{
    public ?string $Id;
    public ?string $Fallback;
    public ?string $Color;
    public ?string $Pretext;
    public ?string $AuthorName;
    public ?string $AuthorLink;
    public ?string $AuthorIcon;
    public ?string $Title;
    public ?string $TitleLink;
    public ?string $Text;
    public ?array $Fields;
    public ?string $ImageURL;
    public ?string $ThumbURL;
    public ?string $Footer;
    public ?string $FooterIcon;

    /** The timestamp of the slack attachment, either type of string or integer */
    public ?string $Timestamp;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->Id = $data['Id'];
        $this->Fallback = $data['Fallback'];
        $this->Color = $data['Color'];
        $this->Pretext = $data['Pretext'];
        $this->AuthorName = $data['AuthorName'];
        $this->AuthorLink = $data['AuthorLink'];
        $this->AuthorIcon = $data['AuthorIcon'];
        $this->Title = $data['Title'];
        $this->TitleLink = $data['TitleLink'];
        $this->Text = $data['Text'];
        $this->Fields = $data['Fields'];
        $this->ImageURL = $data['ImageURL'];
        $this->ThumbURL = $data['ThumbURL'];
        $this->Footer = $data['Footer'];
        $this->FooterIcon = $data['FooterIcon'];
        $this->Timestamp = $data['Timestamp'];
        return $this;
    }
}
