<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserAutocompleteInChannel
{
    /** A list of user objects in the channel */
    public ?array $in_channel;

    /** A list of user objects not in the channel */
    public ?array $out_of_channel;
}
;