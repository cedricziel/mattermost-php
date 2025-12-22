<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * OAuth 2.0 Dynamic Client Registration request as defined in RFC 7591
 */
class ClientRegistrationRequest
{
    public function __construct(
        /** Array of redirection URI strings for use in redirect-based flows such as the authorization code and implicit flows */
        public ?array $redirect_uris = null,
        /** Human-readable string name of the client to be presented to the end-user during authorization */
        public ?string $client_name = null,
        /** URL string of a web page providing information about the client */
        public ?string $client_uri = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ClientRegistrationRequest The hydrated instance
     */
    public static function hydrate(?array $data): ClientRegistrationRequest
    {
        $data ??= [];

        return new self(
            redirect_uris: $data['redirect_uris'] ?? null,
            client_name: $data['client_name'] ?? null,
            client_uri: $data['client_uri'] ?? null,
        );
    }
}
