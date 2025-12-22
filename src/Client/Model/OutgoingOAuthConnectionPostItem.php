<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OutgoingOAuthConnectionPostItem
{
    public function __construct(
        /** The name of the outgoing OAuth connection. */
        public ?string $name = null,
        /** The client ID of the outgoing OAuth connection. */
        public ?string $client_id = null,
        /** The client secret of the outgoing OAuth connection. */
        public ?string $client_secret = null,
        /** The username of the credentials of the outgoing OAuth connection. */
        public ?string $credentials_username = null,
        /** The password of the credentials of the outgoing OAuth connection. */
        public ?string $credentials_password = null,
        /** The OAuth token URL of the outgoing OAuth connection. */
        public ?string $oauth_token_url = null,
        /** The grant type of the outgoing OAuth connection. */
        public ?string $grant_type = null,
        /** The audiences of the outgoing OAuth connection. */
        public ?string $audiences = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return OutgoingOAuthConnectionPostItem The hydrated instance
     */
    public static function hydrate(?array $data): OutgoingOAuthConnectionPostItem
    {
        $data ??= [];

        return new self(
            name: $data['name'] ?? null,
            client_id: $data['client_id'] ?? null,
            client_secret: $data['client_secret'] ?? null,
            credentials_username: $data['credentials_username'] ?? null,
            credentials_password: $data['credentials_password'] ?? null,
            oauth_token_url: $data['oauth_token_url'] ?? null,
            grant_type: $data['grant_type'] ?? null,
            audiences: $data['audiences'] ?? null,
        );
    }
}
