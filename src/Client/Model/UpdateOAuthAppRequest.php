<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateOAuthAppRequest
{
    public function __construct(
        /** The id of the client application */
        public ?string $id = null,
        /** The name of the client application */
        public ?string $name = null,
        /** A short description of the application */
        public ?string $description = null,
        /** A URL to an icon to display with the application */
        public ?string $icon_url = null,
        /** A list of callback URLs for the appliation */
        public ?array $callback_urls = null,
        /** A link to the website of the application */
        public ?string $homepage = null,
        /** Set this to `true` to skip asking users for permission. It will be set to false if value is not provided. */
        public ?bool $is_trusted = null,
    ) {
    }
}
