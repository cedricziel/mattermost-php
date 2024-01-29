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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var bool $data['idp_certificate_file'] */
            if (isset($data['idp_certificate_file'])) $this->idp_certificate_file = $data['idp_certificate_file'];
        /** @var bool $data['public_certificate_file'] */
            if (isset($data['public_certificate_file'])) $this->public_certificate_file = $data['public_certificate_file'];
        /** @var bool $data['private_key_file'] */
            if (isset($data['private_key_file'])) $this->private_key_file = $data['private_key_file'];
        return $this;
    }
}
