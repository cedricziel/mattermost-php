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
}
