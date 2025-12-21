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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): LoginSSOCodeExchangeResponse {
        $object = new self(
            token: isset($data['token']) ? $data['token'] : null,
            csrf: isset($data['csrf']) ? $data['csrf'] : null,
        );
        return $object;
    }
}
