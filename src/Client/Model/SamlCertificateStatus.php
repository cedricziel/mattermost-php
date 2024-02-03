<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SamlCertificateStatus
{
    public function __construct(
        /** Status is good when `true` */
        public ?bool $idp_certificate_file = null,
        /** Status is good when `true` */
        public ?bool $public_certificate_file = null,
        /** Status is good when `true` */
        public ?bool $private_key_file = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            idp_certificate_file: $data['idp_certificate_file'] ?? null,
            public_certificate_file: $data['public_certificate_file'] ?? null,
            private_key_file: $data['private_key_file'] ?? null,
        );
        return $object;
    }
}
