<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RegenCommandTokenResponse
{
    public function __construct(
        /** The new token */
        public ?string $token = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            token: isset($data['token']) ? $data['token'] : null,
        );
        return $object;
    }
}
