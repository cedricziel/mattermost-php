<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LoginSSOCodeExchangeResponse
{
    public function __construct(
        /** Session token for authentication */
        public ?string $token = null,
        /** CSRF token for request validation */
        public ?string $csrf = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return LoginSSOCodeExchangeResponse The hydrated instance
     */
    public static function hydrate(?array $data): LoginSSOCodeExchangeResponse
    {
        $data ??= [];

        return new self(
            token: $data['token'] ?? null,
            csrf: $data['csrf'] ?? null,
        );
    }
}
