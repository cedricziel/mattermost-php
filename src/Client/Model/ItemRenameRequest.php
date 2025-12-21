<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ItemRenameRequest
{
    public function __construct(
        /** The new title of the item. */
        public string $title,
        /** The new slash command of the item. */
        public string $command,
    ) {
    }
}
