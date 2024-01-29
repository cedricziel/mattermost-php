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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['client_secret'] */
            if (isset($data['client_secret'])) $this->client_secret = $data['client_secret'];
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['icon_url'] */
            if (isset($data['icon_url'])) $this->icon_url = $data['icon_url'];
        /** @var array $data['callback_urls'] */
            if (isset($data['callback_urls'])) $this->callback_urls = $data['callback_urls'];
        /** @var string $data['homepage'] */
            if (isset($data['homepage'])) $this->homepage = $data['homepage'];
        /** @var bool $data['is_trusted'] */
            if (isset($data['is_trusted'])) $this->is_trusted = $data['is_trusted'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        return $this;
    }
}
