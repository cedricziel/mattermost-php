<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostLogRequest
{
    public function __construct(
        /** The error level, ERROR or DEBUG */
        public string $level,
        /** Message to send to the server logs */
        public string $message,
    ) {
    }
}
