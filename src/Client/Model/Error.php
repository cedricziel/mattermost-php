<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Error
{
    /** A message with the error description. */
    public ?string $error;

    /** Further details on where and why this error happened. */
    public ?string $details;
}
;