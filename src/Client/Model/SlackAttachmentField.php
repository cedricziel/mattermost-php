<?php

namespace CedricZiel\MattermostPhp\Client;

class SlackAttachmentField
{
    public ?string $Title;

    /** The value of the attachment, set as string but capable with golang interface */
    public ?string $Value;
    public ?bool $Short;
}
;