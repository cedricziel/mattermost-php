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
}
;