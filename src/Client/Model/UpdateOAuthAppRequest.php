<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateOAuthAppRequest
{
    public function __construct(
        /** The id of the client application */
        public string $id,
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
        /** Set this to `true` to skip asking users for permission. It will be set to false if value is not provided. */
        public ?bool $is_trusted = null,
    ) {
    }
}
