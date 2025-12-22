<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RegenCommandTokenResponse
{
    public function __construct(
        /** The new token */
        public ?string $token = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return RegenCommandTokenResponse The hydrated instance
     */
    public static function hydrate(?array $data): RegenCommandTokenResponse
    {
        $data ??= [];

        return new self(
            token: $data['token'] ?? null,
        );
    }
}
