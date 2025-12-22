<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GenerateMfaSecretResponse
{
    public function __construct(
        /** The MFA secret as a string */
        public ?string $secret = null,
        /** A base64 encoded QR code image */
        public ?string $qr_code = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GenerateMfaSecretResponse The hydrated instance
     */
    public static function hydrate(?array $data): GenerateMfaSecretResponse
    {
        $data ??= [];

        return new self(
            secret: $data['secret'] ?? null,
            qr_code: $data['qr_code'] ?? null,
        );
    }
}
