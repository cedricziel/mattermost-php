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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): GenerateMfaSecretResponse {
        $object = new self(
            secret: isset($data['secret']) ? $data['secret'] : null,
            qr_code: isset($data['qr_code']) ? $data['qr_code'] : null,
        );
        return $object;
    }
}
