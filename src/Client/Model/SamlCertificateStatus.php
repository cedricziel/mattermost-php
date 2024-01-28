<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SamlCertificateStatus
{
    /** Status is good when `true` */
    public ?bool $idp_certificate_file;

    /** Status is good when `true` */
    public ?bool $public_certificate_file;

    /** Status is good when `true` */
    public ?bool $private_key_file;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->idp_certificate_file = $data['idp_certificate_file'];
        $this->public_certificate_file = $data['public_certificate_file'];
        $this->private_key_file = $data['private_key_file'];
        return $this;
    }
}
