<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CommandResponse
{
    /** The response type either in_channel or ephemeral */
    public ?string $ResponseType;
    public ?string $Text;
    public ?string $Username;
    public ?string $IconURL;
    public ?string $GotoLocation;
    public ?array $Attachments;
}
;