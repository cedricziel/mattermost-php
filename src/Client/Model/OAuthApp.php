<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OAuthApp
{
    /** The client id of the application */
    public ?string $id;

    /** The client secret of the application */
    public ?string $client_secret;

    /** The name of the client application */
    public ?string $name;

    /** A short description of the application */
    public ?string $description;

    /** A URL to an icon to display with the application */
    public ?string $icon_url;

    /** A list of callback URLs for the appliation */
    public ?array $callback_urls;

    /** A link to the website of the application */
    public ?string $homepage;

    /** Set this to `true` to skip asking users for permission */
    public ?bool $is_trusted;

    /** The time of registration for the application */
    public ?int $create_at;

    /** The last time of update for the application */
    public ?int $update_at;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->client_secret = $data['client_secret'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->icon_url = $data['icon_url'];
        $this->callback_urls = $data['callback_urls'];
        $this->homepage = $data['homepage'];
        $this->is_trusted = $data['is_trusted'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        return $this;
    }
}
