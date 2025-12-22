<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * OAuth 2.0 Authorization Server Metadata as defined in RFC 8414
 */
class AuthorizationServerMetadata
{
    public function __construct(
        /** The authorization server's issuer identifier, which is a URL that uses the "https" scheme */
        public ?string $issuer = null,
        /** URL of the authorization server's authorization endpoint */
        public ?string $authorization_endpoint = null,
        /** URL of the authorization server's token endpoint */
        public ?string $token_endpoint = null,
        /** JSON array containing a list of the OAuth 2.0 response_type values that this authorization server supports */
        public ?array $response_types_supported = null,
        /** URL of the authorization server's OAuth 2.0 Dynamic Client Registration endpoint */
        public ?string $registration_endpoint = null,
        /** JSON array containing a list of the OAuth 2.0 scope values that this authorization server supports */
        public ?array $scopes_supported = null,
        /** JSON array containing a list of the OAuth 2.0 grant type values that this authorization server supports */
        public ?array $grant_types_supported = null,
        /** JSON array containing a list of client authentication methods supported by the token endpoint */
        public ?array $token_endpoint_auth_methods_supported = null,
        /** JSON array containing a list of PKCE code challenge methods supported by this authorization server */
        public ?array $code_challenge_methods_supported = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AuthorizationServerMetadata The hydrated instance
     */
    public static function hydrate(?array $data): AuthorizationServerMetadata
    {
        $data ??= [];

        return new self(
            issuer: $data['issuer'] ?? null,
            authorization_endpoint: $data['authorization_endpoint'] ?? null,
            token_endpoint: $data['token_endpoint'] ?? null,
            response_types_supported: $data['response_types_supported'] ?? null,
            registration_endpoint: $data['registration_endpoint'] ?? null,
            scopes_supported: $data['scopes_supported'] ?? null,
            grant_types_supported: $data['grant_types_supported'] ?? null,
            token_endpoint_auth_methods_supported: $data['token_endpoint_auth_methods_supported'] ?? null,
            code_challenge_methods_supported: $data['code_challenge_methods_supported'] ?? null,
        );
    }
}
