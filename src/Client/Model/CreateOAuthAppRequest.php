<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateOAuthAppRequest
{
    public function __construct(
        /** The name of the client application */
        public string $name,
        /** A short description of the application */
        public string $description,
        /** A list of callback URLs for the appliation */
        public array $callback_urls,
        /** A link to the website of the application */
        public string $homepage,
        /** A URL to an icon to display with the application */
        public ?string $icon_url = null,
        /** Set this to `true` to skip asking users for permission */
        public ?bool $is_trusted = null,
    ) {
    }
}
