<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OAuthApp
{
    public function __construct(
        /** The client id of the application */
        public ?string $id = null,
        /** The client secret of the application */
        public ?string $client_secret = null,
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
        /** Set this to `true` to skip asking users for permission */
        public ?bool $is_trusted = null,
        /** The time of registration for the application */
        public ?int $create_at = null,
        /** The last time of update for the application */
        public ?int $update_at = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            client_secret: isset($data['client_secret']) ? $data['client_secret'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            icon_url: isset($data['icon_url']) ? $data['icon_url'] : null,
            callback_urls: isset($data['callback_urls']) ? $data['callback_urls'] : null,
            homepage: isset($data['homepage']) ? $data['homepage'] : null,
            is_trusted: isset($data['is_trusted']) ? $data['is_trusted'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
        );
        return $object;
    }
}
