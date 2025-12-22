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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return SamlCertificateStatus The hydrated instance
     */
    public static function hydrate(?array $data): SamlCertificateStatus
    {
        $data ??= [];

        return new self(
            idp_certificate_file: $data['idp_certificate_file'] ?? null,
            public_certificate_file: $data['public_certificate_file'] ?? null,
            private_key_file: $data['private_key_file'] ?? null,
        );
    }
}
