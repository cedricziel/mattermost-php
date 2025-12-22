<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * OAuth 2.0 Dynamic Client Registration response as defined in RFC 7591
 */
class ClientRegistrationResponse
{
    public function __construct(
        /** OAuth 2.0 client identifier string */
        public ?string $client_id = null,
        /** OAuth 2.0 client secret string */
        public ?string $client_secret = null,
        /** Array of the registered redirection URI strings */
        public ?array $redirect_uris = null,
        /** String indicator of the requested authentication method for the token endpoint */
        public ?string $token_endpoint_auth_method = null,
        /** Array of OAuth 2.0 grant type strings that the client can use at the token endpoint */
        public ?array $grant_types = null,
        /** Array of the OAuth 2.0 response type strings that the client can use at the authorization endpoint */
        public ?array $response_types = null,
        /** Space-separated list of scope values that the client can use when requesting access tokens */
        public ?string $scope = null,
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
     * @return ClientRegistrationResponse The hydrated instance
     */
    public static function hydrate(?array $data): ClientRegistrationResponse
    {
        $data ??= [];

        return new self(
            client_id: $data['client_id'] ?? null,
            client_secret: $data['client_secret'] ?? null,
            redirect_uris: $data['redirect_uris'] ?? null,
            token_endpoint_auth_method: $data['token_endpoint_auth_method'] ?? null,
            grant_types: $data['grant_types'] ?? null,
            response_types: $data['response_types'] ?? null,
            scope: $data['scope'] ?? null,
            client_name: $data['client_name'] ?? null,
            client_uri: $data['client_uri'] ?? null,
        );
    }
}
